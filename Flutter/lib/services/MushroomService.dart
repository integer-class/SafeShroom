import 'dart:convert';
import 'package:http/http.dart' as http;
import 'package:safeshroom/services/urlVariable.dart';
import 'package:safeshroom/models/mushroom.dart';
import 'package:safeshroom/models/recomendation.dart';

class MushroomService {
  Future<Map<String, dynamic>> getMushroom() async {
    try {
      final response = await http.get(Uri.parse('$baseUrl/getMushroom'));
      if (response.statusCode == 200) {
        final data = json.decode(response.body);

        // Check if the status is 'success'
        if (data['status'] == 'success') {
          // Parse the mushroom data
          List<Mushroom> mushrooms = (data['mushroom'] as List)
              .map((mushroomData) => Mushroom.fromJson(mushroomData))
              .toList();

          // Parse the recommendation data
          List<Recommendation> recommendations = (data['recommendation'] as List)
              .map((recommendationData) =>
                  Recommendation.fromJson(recommendationData))
              .toList();

          return {
            'success': true,
            'mushrooms': mushrooms,
            'recommendation': recommendations,
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
