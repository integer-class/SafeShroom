import 'dart:convert';
import 'package:http/http.dart' as http;
import 'package:safeshroom/services/urlVariable.dart';

class Historyservice {

  Future<Map<String, dynamic>> addHistory({
    required String userId,
    required String mushroomId,
    String? recommendationId,
  }) async {
    try {
    final response = await http.post(
      Uri.parse('$baseUrl/history'),
      headers: {
        'Content-Type': 'application/json',
      },
      body: jsonEncode({
        'id_user': userId,
        'id_mushroom': mushroomId,
        'id_recommendation': recommendationId , // Bisa null
      }),
    );

    if (response.statusCode == 201) {
      final decodedResponse = jsonDecode(response.body);
      print('Success: ${decodedResponse['message']}');
      return decodedResponse;
    } else {
      final errorResponse = jsonDecode(response.body);
      print('Error: ${response.statusCode} - ${errorResponse['message']}');
      throw Exception('Failed to create history: ${errorResponse['message']}');
    }
    } catch (e) {
      print('Exception: $e');
      throw Exception('Error adding history: $e');
    }
  }

  Future<Map<String, dynamic>> getHistory({required String? userId}) async {
    try {
      final response = await http.get(
        Uri.parse('$baseUrl/history/$userId'),
        headers: {
          'Content-Type': 'application/json',
        },
      );

      if (response.statusCode == 200) {
        final decodedResponse = jsonDecode(response.body);
        print('Success: ${decodedResponse['status']}');

        // Check if the message indicates no history
        if (decodedResponse['message'] == 'No history found for this user.') {
          print('No history available.');
          return {
            'mushrooms': null,
            'recommendations': null,
          };
        }
        print(json.encode(decodedResponse));
        return {
          'mushrooms': decodedResponse['mushrooms'],
          'recommendations': decodedResponse['recommendations'],
        };
      } else {
        final errorResponse = jsonDecode(response.body);
        print('Error: ${response.statusCode} - ${errorResponse['message']}');
        throw Exception('Failed to fetch history: ${errorResponse['message']}');
      }
    } catch (e) {
      print('Exception: $e');
      throw Exception('Error fetching history: $e');
    }
  }
}
