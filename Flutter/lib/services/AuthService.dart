import 'dart:convert';
import 'package:http/http.dart' as http;
import 'package:shared_preferences/shared_preferences.dart';
import 'urlVariable.dart';

class AuthService {
  Future<Map<String, dynamic>> login(String username, String password) async {
    try {
      final response = await http.post(
        Uri.parse('$baseUrl/login'),
        body: {
          'email': username, // Assuming email is used for login
          'password': password,
        },
      );

      if (response.statusCode == 200) {
        final jsonResponse = json.decode(response.body);

        // Save token and user info
        final prefs = await SharedPreferences.getInstance();
        await prefs.setString('user_token', jsonResponse['user_token'] ?? '');
        await prefs.setString('user_email', jsonResponse['email'] ?? '');

        return {
          'success': true,
          'message': 'Login successful',
          'data': jsonResponse
        };
      } else {
        return {
          'success': false,
          'message': json.decode(response.body)['message'] ?? 'Login failed',
        };
      }
    } catch (e) {
      return {
        'success': false,
        'message': 'An error occurred: ${e.toString()}',
      };
    }
  }

  Future<Map<String, dynamic>> register({
    String? username,
    String? email,
    String? password,
    String? phoneNumber,
  }) async {
    try {
      final response = await http.post(
        Uri.parse('http://13.70.136.185/api/daftar'),
        body: {
          'name': username,
          'email': email,
          'password': password,
          'phone_number': phoneNumber ?? '',
        },
      );

      if (response.statusCode == 201) {
        final jsonResponse = json.decode(response.body);
        return {
          'success': true,
          'message': 'Registration successful',
          'data': jsonResponse
        };
      } else {
        return {
          'success': false,
          'message':
              json.decode(response.body)['message'] ?? 'Registration failed',
        };
      }
    } catch (e) {
      return {
        'success': false,
        'message': 'An error occurred: ${e}',
      };
    }
  }

  Future<void> logout() async {
    final prefs = await SharedPreferences.getInstance();
    await prefs.remove('user_token');
    await prefs.remove('user_email');
  }

  Future<bool> isLoggedIn() async {
    final prefs = await SharedPreferences.getInstance();
    return prefs.getString('user_token') != null;
  }
}
