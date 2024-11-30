class User {
  final String email;
  final String token;
  final String tokenType;
  final bool verified;
  final String status;

  User({
    required this.email,
    required this.token,
    required this.tokenType,
    required this.verified,
    required this.status,
  });

  factory User.fromJson(Map<String, dynamic> json) {
    return User(
      email: json['email'] ?? '',
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
      'token_type': tokenType,
      'verified': verified,
      'status': status,
    };
  }
}