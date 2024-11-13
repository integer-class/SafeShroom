import 'package:flutter/material.dart';
import 'package:safeshroom/Style/FontStyle.dart';

class Homepage extends StatefulWidget {
  const Homepage({super.key});

  @override
  State<Homepage> createState() => _HomepageState();
}

class _HomepageState extends State<Homepage> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        leading: SizedBox(
            height: 50, width: 10, child: Image.asset('images/Logo1.png')),
        title: Text(
          'SafeShroom',
          style: SubtitleTextStyle2,
          textAlign: TextAlign.left,
        ),
        //create a button with an setting icon on the right side of the bar
        actions: [IconButton(onPressed: () {}, icon: Image.asset("assets/Settings.png"))],
      ),

      body: Container(
        decoration: BoxDecoration(
          //add background color for the entire body
          color: Color.fromARGB(255, 190, 204, 198),
          ),
        child: Column(
          children: [
            Container(
              margin: EdgeInsets.all(40),
              decoration: BoxDecoration(
                //create a circular rectangle as the border
                borderRadius: BorderRadius.circular(20),
                color: Colors.white,

              ),
              child: Center(
                child: Column(children: [
                SizedBox(height: 8,),
                Text(
                  'Hello Nanda',
                  style: HelloTextStyle,
                  textAlign: TextAlign.center,
                ),
                SizedBox(height: 6,),
                Text(
                  'Welcome to SafeShroom',
                  style: WelcomeTextStyle,
                  textAlign: TextAlign.center,
                ),
                ],),
              ),
            ),
            SizedBox(height: 10,),
            Container(
              child: Column(
                children: [
                  Text(
                    'Article',
                    style: SectionTextStyle,
                  )
                ],
              ),
            )
          ],
        ),
      ),
    );
  }
}
