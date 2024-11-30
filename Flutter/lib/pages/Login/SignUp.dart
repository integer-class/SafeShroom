import "package:flutter/material.dart";
import "package:go_router/go_router.dart";
import "package:safeshroom/Style/FontStyle.dart";
import "package:safeshroom/controller/route_constants.dart";
import "package:safeshroom/services/AuthService.dart";

class Signup extends StatefulWidget {
  const Signup({super.key});

  @override
  State<Signup> createState() => _SignupState();
}

class _SignupState extends State<Signup> {
  final _formKey = GlobalKey<FormState>();
  final _usernameController = TextEditingController();
  final _emailController = TextEditingController();
  final _passwordController = TextEditingController();
  final _confirmPasswordController = TextEditingController();
  final AuthService _authService = AuthService();
  bool _isLoading = false;

  void _register() async {
    if (_formKey.currentState!.validate()) {
      // Check if passwords match
      if (_passwordController.text != _confirmPasswordController.text) {
        ScaffoldMessenger.of(context).showSnackBar(
          SnackBar(
            content: Text('Passwords do not match'),
            backgroundColor: Colors.red,
          ),
        );
        return;
      }

      setState(() {
        _isLoading = true;
      });

      final result = await _authService.register(
        username: _usernameController.text.trim(),
        email: _emailController.text.trim(),
        password: _passwordController.text.trim(),
      );

      setState(() {
        _isLoading = false;
      });

      if (result['success']) {
        // Navigate to sign in or home
        GoRouter.of(context).go(RouteConstants.signin);
        ScaffoldMessenger.of(context).showSnackBar(
          SnackBar(
            content: Text('Registration Successful. Please Sign In.'),
            backgroundColor: Colors.green,
          ),
        );
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
  void dispose() {
    // Clean up controllers
    _usernameController.dispose();
    _emailController.dispose();
    _passwordController.dispose();
    _confirmPasswordController.dispose();
    super.dispose();
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
          "Sign Up",
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
        child: SingleChildScrollView(
          child: Form(
            key: _formKey,
            child: Column(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                Image.asset('images/Logo1.png'),
                Container(
                  margin: const EdgeInsets.all(20),
                  child: Column(
                    mainAxisAlignment: MainAxisAlignment.start,
                    children: [
                      TextFormField(
                        controller: _usernameController,
                        decoration: InputDecoration(
                          labelText: 'Username',
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
                            return 'Please enter a username';
                          }
                          if (value.length < 3) {
                            return 'Username must be at least 3 characters';
                          }
                          return null;
                        },
                      ),
                      SizedBox(height: 8),
                      TextFormField(
                        controller: _emailController,
                        decoration: InputDecoration(
                          labelText: 'Email Address',
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
                            return 'Please enter an email';
                          }
                          // Basic email validation
                          if (!RegExp(r'^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$')
                              .hasMatch(value)) {
                            return 'Please enter a valid email';
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
                            return 'Please enter a password';
                          }
                          if (value.length < 6) {
                            return 'Password must be at least 6 characters';
                          }
                          return null;
                        },
                      ),
                      SizedBox(height: 8),
                      TextFormField(
                        controller: _confirmPasswordController,
                        obscureText: true,
                        decoration: InputDecoration(
                          labelText: 'Re-enter your password',
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
                            return 'Please confirm your password';
                          }
                          if (value != _passwordController.text) {
                            return 'Passwords do not match';
                          }
                          return null;
                        },
                      ),
                      SizedBox(height: 8),
                      Row(
                        mainAxisAlignment: MainAxisAlignment.center,
                        children: [
                          Text(
                            'Already have account ?',
                            style: SmallTextStyle2,
                          ),
                          TextButton(
                            onPressed: () {
                              GoRouter.of(context).go(RouteConstants.signin);
                            },
                            child: Text(
                              'Sign In',
                              style: TextButtonTextStyle2,
                            ),
                          ),
                        ],
                      ),
                      _isLoading
                          ? CircularProgressIndicator()
                          : ElevatedButton(
                              style: ElevatedButton.styleFrom(
                                backgroundColor: Colors.green,
                                side: BorderSide(color: Colors.white),
                                shape: RoundedRectangleBorder(
                                  borderRadius: BorderRadius.circular(12.0),
                                ),
                                minimumSize: Size(211, 50),
                              ),
                              onPressed: _register,
                              child: Text(
                                'SIGN UP',
                                style: ButtonTextStyle,
                              ))
                    ],
                  ),
                ),
              ],
            ),
          ),
        ),
      ),
    );
  }
}
