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
        leading: SizedBox(height:50,width:10,child:Image.asset('images/Logo1.png')),
        
        title: Text('SafeShroom',style: SubtitleTextStyle2, textAlign: TextAlign.left,),
      ),

      body: Container(
        child: Column(
          children: [
            Row(
              children: [
                
              ],
            )
          ],
        ),
        ),
    );
  }
}
