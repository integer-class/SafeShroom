import 'package:flutter/material.dart';
import 'package:safeshroom/Style/FontStyle.dart';

class Signin extends StatefulWidget {
  const Signin({super.key});

  @override
  State<Signin> createState() => _SignInState();
}

class _SignInState extends State<Signin> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar :AppBar(
        leading: IconButton(
          icon:
              Image.asset('assets/back.png'), // Use your back button image here
          onPressed: () {
            Navigator.pop(context); // Action to go back
          },
        ),
        centerTitle: true, // Center the title
        title: Text(
          "Sign In",
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
          children: [
          Image.asset('images/Logo1.png'),
          SizedBox(height: 10,),
          Container(
            margin: EdgeInsets.all(20),
            child: Column(
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
                SizedBox(height: 8,),
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

              ],
            ),
          ),
          Row(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              Text("Don't have account?",style: SmallTextStyle2,),
              TextButton(onPressed: (){}, child: Text('Sign Up',style: TextButtonTextStyle2,),)
            ],
          ),
          SizedBox(height:8),
          ElevatedButton(
           style: ElevatedButton.styleFrom(
              backgroundColor: Colors.green,
              shape: RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(12.0),
                      ),
                      minimumSize: Size(211, 50),
            ),
            onPressed: (){}, child: Text('SIGN IN' ,style: ButtonTextStyle,))
          ],

        )
      )
    );
  }
}