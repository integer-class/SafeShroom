import 'dart:io';
import 'dart:convert';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:image_picker/image_picker.dart';
import 'package:image/image.dart' as img;
import 'package:safeshroom/pages/Summary/SummaryScan.dart';
import 'package:safeshroom/services/urlVariable.dart';

class Scanservice {
  Future<void> pickImage(BuildContext context) async {
    try {
      final selectedImage =
          await ImagePicker().pickImage(source: ImageSource.gallery);
      if (selectedImage != null) {
        final file = File(selectedImage.path);
        await checkMushroom(file, context);
      } else {
        print('No image selected.');
      }
    } catch (e) {
      print('Error picking image: $e');
      ScaffoldMessenger.of(context).showSnackBar(
        SnackBar(content: Text('Error selecting image: $e')),
      );
    }
  }

  Future<void> pickImageCamera(BuildContext context) async {
    try {
      final selectedImage =
          await ImagePicker().pickImage(source: ImageSource.camera);
      if (selectedImage != null) {
        final file = File(selectedImage.path);
        await checkMushroom(file, context);
      } else {
        print('No image selected.');
      }
    } catch (e) {
      print('Error picking image: $e');
      ScaffoldMessenger.of(context).showSnackBar(
        SnackBar(content: Text('Error capturing image: $e')),
      );
    }
  }

  Future<void> checkMushroom(File selectedImage, BuildContext context) async {
    try {
      final originalImage = img.decodeImage(selectedImage.readAsBytesSync());
      if (originalImage == null) {
        print("Invalid image");
        return;
      }

      final resizedImage = img.copyResize(originalImage, width: 800);
      final compressedImageFile = File('${selectedImage.path}_compressed.jpg');
      compressedImageFile
          .writeAsBytesSync(img.encodeJpg(resizedImage, quality: 85));

      final request = http.MultipartRequest(
        'POST',
        Uri.parse('$baseUrl/check_mushroom'),
      );
      request.files.add(
        http.MultipartFile.fromBytes(
          'files',
          compressedImageFile.readAsBytesSync(),
          filename: compressedImageFile.path.split('/').last,
        ),
      );

      final streamedResponse = await request.send();
      final response = await http.Response.fromStream(streamedResponse);

      if (response.statusCode == 200) {
        final decodedResponse = json.decode(response.body);
        print(decodedResponse);

        var mushroom = decodedResponse['mushroom'] ?? {};
        var recommendation = decodedResponse['recomendation'] ?? {};

        Navigator.push(
          context,
          MaterialPageRoute(
            builder: (context) => SummaryScan(
              mushroom: mushroom,
              recommendation: recommendation,
            ),
          ),
        );
      } else {
        print("Failed to process image. Status: ${response.statusCode}");
        ScaffoldMessenger.of(context).showSnackBar(
          SnackBar(content: Text('Error: ${response.statusCode}')),
        );
      }
    } catch (e) {
      print("Error: $e");
      ScaffoldMessenger.of(context).showSnackBar(
        SnackBar(content: Text('Error processing image: $e')),
      );
    }
  }
}
