import 'dart:convert';
import 'package:http/http.dart' as http;
import 'package:safeshroom/services/urlVariable.dart';


class MushroomService {
  Future<Map<String, dynamic>> getMushroom() async {
    try {
      final response = await http.get(Uri.parse('$baseUrl/mushrooms'));
      if (response.statusCode == 200) {
        final data = json.decode(response.body);
        if (data['status'] == 'success') {
          return {
            'success': true,
            'mushrooms': data['mushroom'],
            'recommendation': data['recommendation'],
          };
        } else {
          return {
            'success': false,
            'message': data['message'] ?? 'Failed to fetch data',
          };
        }
      } else {
        return {
          'success': false,
          'message': 'Failed with status code ${response.statusCode}',
        };
      }
    } catch (e) {
      return {
        'success': false,
        'message': 'An error occurred: ${e.toString()}',
      };
    }
  }
}
