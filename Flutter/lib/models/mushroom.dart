class Mushroom {
  final int id;
  final String name;
  final String description;
  final String ? photo;
  final bool isPoisonous;
  final int isEdible;
  final DateTime createdAt;
  final DateTime updatedAt;

  Mushroom({
    required this.id,
    required this.name,
    required this.description,
    required this.photo,
    required this.isPoisonous,
    required this.isEdible,
    required this.createdAt,
    required this.updatedAt,
  });

  // Factory method to create a Mushroom instance from a JSON map
  factory Mushroom.fromJson(Map<String, dynamic> json) {
    return Mushroom(
      id: json['id'],
      name: json['name'],
      description: json['description'],
      photo: json['photo'],
      isPoisonous: json['is_poisonous'],
      isEdible: json['is_edible'],
      createdAt: DateTime.parse(json['created_at']),
      updatedAt: DateTime.parse(json['updated_at']),
    );
  }

  // Method to convert a Mushroom instance to JSON
  Map<String, dynamic> toJson() {
    return {
      'id': id,
      'name': name,
      'description': description,
      'photo': photo,
      'is_poisonous': isPoisonous,
      'is_edible': isEdible,
      'created_at': createdAt.toIso8601String(),
      'updated_at': updatedAt.toIso8601String(),
    };
  }
}

class MushroomResponse {
  final String status;
  final List<Mushroom> data;

  MushroomResponse({required this.status, required this.data});

  // Factory method to create a MushroomResponse instance from JSON
  factory MushroomResponse.fromJson(Map<String, dynamic> json) {
    var list = json['data'] as List;
    List<Mushroom> mushroomList =
        list.map((i) => Mushroom.fromJson(i)).toList();

    return MushroomResponse(
      status: json['status'],
      data: mushroomList,
    );
  }

  // Method to convert MushroomResponse instance to JSON
  Map<String, dynamic> toJson() {
    return {
      'status': status,
      'data': data.map((mushroom) => mushroom.toJson()).toList(),
    };
  }
}
