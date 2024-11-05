import "package:flutter/material.dart";
import "package:safeshroom/Style/FontStyle.dart";

class Signup extends StatefulWidget {
  const Signup({super.key});

  @override
  State<Signup> createState() => _SignupState();
}

class _SignupState extends State<Signup> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        leading: IconButton(
          icon:
              Image.asset('assets/back.png'), // Use your back button image here
          onPressed: () {
            Navigator.pop(context); // Action to go back
          },
        ),
        centerTitle: true, // Center the title
        title: Text(
          "Sign Up",
          style: TextStyle(
            color: Colors.black, // Black color
            fontWeight: FontWeight.bold, // Bold text
          ),
          textAlign: TextAlign.center,
        ),
        backgroundColor:
            Colors.white, // Optional: background color for the AppBar
        elevation: 0, // Optional: remove shadow
      ),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            Image.asset('images/Logo1.png'),
            Container(
              margin: const EdgeInsets.all(20),
              child: Column(
                mainAxisAlignment: MainAxisAlignment.start,
                children: [
                  TextField(
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
                  ),
                  SizedBox(height: 8),
                  TextField(
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
                  ),
                  SizedBox(height: 8),
                  TextField(
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
                  ),
                  SizedBox(height: 8),
                  TextField(
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
                  ),
                  SizedBox(
                    height: 8,
                  ),
                  Row(
                    mainAxisAlignment: MainAxisAlignment.center,
                    children: [
                      Text(
                        'Already have account ?',
                        style: SmallTextStyle2,
                      ),
                      TextButton(
                          onPressed: () {},
                          child: Text(
                            'Sign In',
                            style: TextButtonTextStyle2,
                          )),
                    ],
                  ),
                  ElevatedButton(style: ElevatedButton.styleFrom(
                    backgroundColor: Colors.green,
                      side: BorderSide(color: Colors.white),
                      shape: RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(12.0),
                      ),
                      minimumSize: Size(211, 50),
                  ),onPressed: () {}, child: Text('SIGN UP',style: ButtonTextStyle,))
                ],
              ),
            ),
          ],
        ),
      ),
    );
  }
}
