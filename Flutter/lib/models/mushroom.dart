class Mushroom {
  final String id;
  final String name;
  final String scientificName;
  final String category; // e.g., 'Edible' or 'Inedible'
  final String imageUrl;

  Mushroom({
    required this.id,
    required this.name,
    required this.scientificName,
    required this.category,
    required this.imageUrl,
  });

  // Convert JSON to Mushroom object
  factory Mushroom.fromJson(Map<String, dynamic> json) {
    return Mushroom(
      id: json['id'] ?? '',
      name: json['name'] ?? '',
      scientificName: json['scientific_name'] ?? '',
      category: json['category'] ?? '',
      imageUrl: json['image_url'] ?? '',
    );
  }

  // Convert Mushroom object to JSON
  Map<String, dynamic> toJson() {
    return {
      'id': id,
      'name': name,
      'scientific_name': scientificName,
      'category': category,
      'image_url': imageUrl,
    };
  }
}