import 'package:flutter/material.dart';
import 'package:go_router/go_router.dart';
import 'package:safeshroom/Style/FontStyle.dart';
import 'package:safeshroom/controller/route_constants.dart';
import 'package:safeshroom/services/AuthService.dart';

class Signin extends StatefulWidget {
  const Signin({super.key});

  @override
  State<Signin> createState() => _SignInState();
}

class _SignInState extends State<Signin> {
  final _formKey = GlobalKey<FormState>();
  final _usernameController = TextEditingController();
  final _passwordController = TextEditingController();
  final AuthService _authService = AuthService();
  bool _isLoading = false;

  void _login() async {
    if (_formKey.currentState!.validate()) {
      setState(() {
        _isLoading = true;
      });

      final result = await _authService.login(
        _usernameController.text.trim(),
        _passwordController.text.trim(),
      );

      setState(() {
        _isLoading = false;
      });

      if (result['success']) {
        // Navigate to home or dashboard
        GoRouter.of(context).go(RouteConstants.home);
      } else {
        // Show error message
        ScaffoldMessenger.of(context).showSnackBar(
          SnackBar(
            content: Text(result['message']),
            backgroundColor: Colors.red,
          ),
        );
      }
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        leading: IconButton(
          icon: Image.asset('assets/back.png'),
          onPressed: () {
            GoRouter.of(context).go(RouteConstants.landing);
          },
        ),
        centerTitle: true,
        title: Text(
          "Sign In",
          style: TextStyle(
            color: Colors.black,
            fontWeight: FontWeight.bold,
          ),
          textAlign: TextAlign.center,
        ),
        backgroundColor: Colors.white,
        elevation: 0,
      ),
      body: Center(
        child: Form(
          key: _formKey,
          child: Column(
            children: [
              Image.asset('images/Logo1.png'),
              SizedBox(height: 10),
              Container(
                margin: EdgeInsets.all(20),
                child: Column(
                  children: [
                    TextFormField(
                      controller: _usernameController,
                      decoration: InputDecoration(
                        labelText: 'Username/Email',
                        contentPadding: EdgeInsets.all(20),
                        border: OutlineInputBorder(
                          borderRadius: BorderRadius.circular(30),
                          borderSide: BorderSide.none,
                        ),
                        filled: true,
                        fillColor: Colors.grey,
                      ),
                      validator: (value) {
                        if (value == null || value.isEmpty) {
                          return 'Please enter your username or email';
                        }
                        return null;
                      },
                    ),
                    SizedBox(height: 8),
                    TextFormField(
                      controller: _passwordController,
                      obscureText: true,
                      decoration: InputDecoration(
                        labelText: 'Password',
                        contentPadding: EdgeInsets.all(20),
                        border: OutlineInputBorder(
                          borderRadius: BorderRadius.circular(30),
                          borderSide: BorderSide.none,
                        ),
                        filled: true,
                        fillColor: Colors.grey,
                      ),
                      validator: (value) {
                        if (value == null || value.isEmpty) {
                          return 'Please enter your password';
                        }
                        return null;
                      },
                    ),
                  ],
                ),
              ),
              Row(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  Text(
                    "Don't have account?",
                    style: SmallTextStyle2,
                  ),
                  TextButton(
                    onPressed: () {
                      GoRouter.of(context).go(RouteConstants.signup);
                    },
                    child: Text(
                      'Sign Up',
                      style: TextButtonTextStyle2,
                    ),
                  )
                ],
              ),
              SizedBox(height: 8),
              _isLoading
                  ? CircularProgressIndicator()
                  : ElevatedButton(
                      style: ElevatedButton.styleFrom(
                        backgroundColor: Colors.green,
                        shape: RoundedRectangleBorder(
                          borderRadius: BorderRadius.circular(12.0),
                        ),
                        minimumSize: Size(211, 50),
                      ),
                      onPressed: _login,
                      child: Text(
                        'SIGN IN',
                        style: ButtonTextStyle,
                      ))
            ],
          ),
        ),
      ),
    );
  }
}