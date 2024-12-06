// To parse this JSON data, do
//
//     final recommendation = recommendationFromJson(jsonString);

import 'dart:convert';

Recommendation recommendationFromJson(String str) => Recommendation.fromJson(json.decode(str));

String recommendationToJson(Recommendation data) => json.encode(data.toJson());

class Recommendation {
    int? id;
    String? title;
    String? description;
    int? mushroomId;
    String? photo;
    DateTime? createdAt;
    DateTime? updatedAt;

    Recommendation({
        this.id,
        this.title,
        this.description,
        this.mushroomId,
        this.photo,
        this.createdAt,
        this.updatedAt,
    });

    factory Recommendation.fromJson(Map<String, dynamic> json) => Recommendation(
        id: json["id"],
        title: json["title"],
        description: json["description"],
        mushroomId: json["mushroom_id"],
        photo: json["photo"],
        createdAt: json["created_at"] == null ? null : DateTime.parse(json["created_at"]),
        updatedAt: json["updated_at"] == null ? null : DateTime.parse(json["updated_at"]),
    );

    Map<String, dynamic> toJson() => {
        "id": id,
        "title": title,
        "description": description,
        "mushroom_id": mushroomId,
        "photo": photo,
        "created_at": createdAt?.toIso8601String(),
        "updated_at": updatedAt?.toIso8601String(),
    };
}
