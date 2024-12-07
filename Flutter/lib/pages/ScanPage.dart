import 'dart:io';
import 'package:flutter/material.dart';
import 'package:image_picker/image_picker.dart';

class Scanpage extends StatefulWidget {
  const Scanpage({super.key});

  @override
  _ScanpageState createState() => _ScanpageState();
}

class _ScanpageState extends State<Scanpage> {
  XFile? _image;
  final _picker = ImagePicker();

  Future<void> _getImage() async {
    final pickedFile = await _picker.pickImage(source: ImageSource.camera);
    setState(() {
      _image = pickedFile;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Scan and Upload'),
      ),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            if (_image != null)
              Image.file(
                File(_image!.path),
                width: 200,
                height: 200,
              ),
            const SizedBox(height: 16.0),
            ElevatedButton(
              onPressed: _getImage,
              child: const Text('Scan and Upload'),
            ),
          ],
        ),
      ),
    );
  }
}