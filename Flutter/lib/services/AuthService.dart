import 'dart:convert';
import 'package:dartz/dartz.dart';
import 'package:http/http.dart' as http;
import 'package:safeshroom/models/user.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'urlVariable.dart';

class AuthService {
  // Save user data as a single JSON object
  Future<void> saveAuthData(User userData) async {
    final prefs = await SharedPreferences.getInstance();
    await prefs.setString('auth_data', json.encode(userData));
    
   
  }

  // Retrieve user data from shared preferences
  Future<User?> getAuthData() async {
    final prefs = await SharedPreferences.getInstance();
    final authDataString = prefs.getString('auth_data');

    if (authDataString != null) {
      return User.fromJson(json.decode(authDataString));
    }
    return null;
  }

  // Check if user is logged in
  Future<bool> isLoggedIn() async {
    final prefs = await SharedPreferences.getInstance();
    return prefs.containsKey('auth_data');
  }

  // Login user
  Future<Either<String, User>> login(String username, String password) async {
    try {
      final response = await http.post(
        Uri.parse('$baseUrl/login'),
        body: {
          'email': username, // Assuming email is used for login
          'password': password,
        },
      );

      if (response.statusCode == 200) {
        saveAuthData(User.fromJson(json.decode(response.body)));

        return Right(User.fromJson(json.decode(response.body)));
      } else if (response.statusCode == 401) {
        return Left('Invalid email or password');
      } else {
        return Left('An error occurred: ${response.body}');
      }
    } catch (e) {
      return Left('An error occured : $e');
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
          'message':
              json.decode(response.body)['message'] ?? 'Registration failed',
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
    return authData?.user_id; // Access the 'id' property of the User object
  }

  Future<String?> getUserEmail() async {
    final authData = await getAuthData();
    return authData?.email; // Access the 'id' property of the User object
  }
  Future<String?> getUserName() async {
    final authData = await getAuthData();
    return authData?.name; // Access the 'id' property of the User object
  }
}
