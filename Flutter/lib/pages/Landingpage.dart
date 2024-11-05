import "package:flutter/material.dart";
import "package:flutter/widgets.dart";
import "package:safeshroom/Style/FontStyle.dart";


class Landingpage extends StatefulWidget {
  const Landingpage({super.key});

  @override
  State<Landingpage> createState() => _nameState();
}

class _nameState extends State<Landingpage> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Center(
        child: Container(
          decoration: BoxDecoration(
            image:DecorationImage(
              image:AssetImage('images/landing.jpg'),
              fit: BoxFit.cover,
              colorFilter: ColorFilter.mode(Colors.black.withOpacity(0.5),BlendMode.darken )),
          ),
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
          children: [
            Image.asset('images/Logo1.png'),
            Padding(
              padding: const EdgeInsets.only(left:27.0,top: 10),
              child: Text(
                'Welcome To SafeShroom',
                 style: TitleTextStyle,
              ),
            ),
            Padding(
              padding: const EdgeInsets.only(left: 27,right: 27),
              child: Text(
                'We are here to help  you, Find what you are looking for now from Mushroom !',
                style: SubtitleTextStyle,
              ),
            ),
            Container(
              margin: EdgeInsets.all(40.0),
              child: Column(
              
              children: [
                ElevatedButton(
                style: ElevatedButton.styleFrom(
                      backgroundColor: Colors.green,
                      side: BorderSide(color: Colors.white),
                      shape: RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(30.0),
                      ),
                      minimumSize: Size(double.infinity, 50),
                    ),
                    onPressed: () { },
                    child: Row(
                      children: [
                        SizedBox(
                        width: 50, 
                        height: 24, 
                        child: Image.asset('images/LogoGoogle.png'),
                        
                        ),Text(
                          'Sign in with Google ',
                          style:ButtonTextStyle,
                          textAlign: TextAlign.center,
                        ),
                      ],
                    ),  
                ),
                SizedBox(height: 8),
                ElevatedButton(
                style: ElevatedButton.styleFrom(
                      backgroundColor: Colors.green,
                      side: BorderSide(color: Colors.white),
                      shape: RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(30.0),
                      ),
                      minimumSize: Size(double.infinity, 50),
                    ),
                    onPressed: () { },
                    child: Text(
                      'Create an account',
                      style: ButtonTextStyle,
                      textAlign: TextAlign.center,
                    )
                ),
                SizedBox(height: 8),
                ElevatedButton(
                style: ElevatedButton.styleFrom(
                      backgroundColor: Colors.green,
                      side: BorderSide(color: Colors.white),
                      shape: RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(30.0),
                      ),
                      minimumSize: Size(double.infinity, 50),
                    ),
                    onPressed: () { },
                    child: Text(
                      'Login as Guest',
                      style: ButtonTextStyle,
                      textAlign: TextAlign.center,
                    )
                ),
                SizedBox(height: 10),
                Row(
                  mainAxisAlignment: MainAxisAlignment.center,
                  children: [
                    Text(
                      'Already have an account ?',
                      style: SmallTextStyle,),
                    TextButton(
                      onPressed: (){},
                      child: Text(
                        'Sign In',
                        style: TextButtonTextStyle,
                        ),
                      ),
                  ],
                )
              ],
            ),)
          ],
          ) ,
        ),
      ) 
      
    );
  }
}
