import 'dart:convert';
import 'package:http/http.dart' as http;
import 'package:shared_preferences/shared_preferences.dart';
import 'urlVariable.dart';

class AuthService {
  // Save user data as a single JSON object
  Future<void> saveAuthData(Map<String, dynamic> userData) async {
    final prefs = await SharedPreferences.getInstance();
    await prefs.setString('auth_data', json.encode(userData));
  }

  // Retrieve user data from shared preferences
  Future<Map<String, dynamic>?> getAuthData() async {
    final prefs = await SharedPreferences.getInstance();
    final authDataString = prefs.getString('auth_data');
    if (authDataString != null) {
      return json.decode(authDataString);
    }
    return null;
  }

  // Check if user is logged in
  Future<bool> isLoggedIn() async {
    final prefs = await SharedPreferences.getInstance();
    return prefs.containsKey('auth_data');
  }

  // Login user
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

        print('Login response: $jsonResponse');

        // Save user data as JSON object
        await saveAuthData({
          'user_id': jsonResponse['id'],
          'user_token': jsonResponse['user_token'],
          'email': jsonResponse['email'],
          
        });

        return {
          'success': true,
          'message': 'Login successful',
          'data': jsonResponse,
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

  // Register user
  Future<Map<String, dynamic>> register({
    required String username,
    required String email,
    required String password,
  }) async {
    try {
      final response = await http.post(
        Uri.parse('$baseUrl/daftar'),
        body: {
          'name': username,
          'email': email,
          'password': password,
        },
      );

      if (response.statusCode == 201) {
        final jsonResponse = json.decode(response.body);
        return {
          'success': true,
          'message': 'Registration successful',
          'data': jsonResponse,
        };
      } else {
        return {
          'success': false,
          'message': json.decode(response.body)['message'] ?? 'Registration failed',
        };
      }
    } catch (e) {
      return {
        'success': false,
        'message': 'An error occurred: ${e.toString()}',
      };
    }
  }

  // Logout user
  Future<void> logout() async {
    final prefs = await SharedPreferences.getInstance();
    await prefs.remove('auth_data');
  }

  // Retrieve user ID
  Future<String?> getUserId() async {
    final authData = await getAuthData();
    return authData?['user_id'];
  }

  // Retrieve user token
  Future<String?> getUserToken() async {
    final authData = await getAuthData();
    return authData?['user_token'];
  }
}
