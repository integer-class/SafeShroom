class User {
  final String email;
  final String user_id;
  final String name;
  final String token;
  final String tokenType;
  final bool verified;
  final String status;

  User({
    required this.email,
    required this.user_id,
    required this.name,
    required this.token,
    required this.tokenType,
    required this.verified,
    required this.status,
  });

  factory User.fromJson(Map<String, dynamic> json) {
    return User(
      email: json['email'] ?? '',
      user_id: json['user_id'] ?? '',
      name: json['name'] ?? '',
      token: json['user_token'] ?? '',
      tokenType: json['token_type'] ?? 'Bearer',
      verified: json['verified'] ?? false,
      status: json['status'] ?? '',
    );
  }

  Map<String, dynamic> toJson() {
    return {
      'email': email,
      'user_token': token,
      'user_id': user_id,
      'name': name,
      'token_type': tokenType,
      'verified': verified,
      'status': status,
    };
  }
}
