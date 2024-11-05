import "package:flutter/material.dart";

class Loginpage extends StatefulWidget {
  const Loginpage({super.key});

  @override
  State<Loginpage> createState() => _nameState();
}

class _nameState extends State<Loginpage> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
    body:
     Center(
      child: Container(
        decoration: BoxDecoration(
          image: DecorationImage(
          image: AssetImage('images/landing.jpg'),
          fit: BoxFit.cover )
        ),
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            Image.asset('images/Logo1.png'),
            const Text(
              'Welcome To Safeshroom',
              style: TextStyle(fontSize: 20, color: Colors.white),
            ),
            const Text(
              'We are here to help you find information about mushroom',
              style: TextStyle(fontSize: 18, color: Colors.white),
              textAlign: TextAlign.center,
            ),
            Container(
              margin: const EdgeInsets.all(40),
              child: Column(
                children: [
                  TextField(
                    decoration: InputDecoration(
                      labelText: 'Username',
                      contentPadding: EdgeInsets.all(20),
                      border: OutlineInputBorder(),
                      filled: true,
                      fillColor: Colors.white,
                    ),
                  ),
                  SizedBox(height: 8.0),
                  TextField(
                    decoration: InputDecoration(
                      contentPadding: EdgeInsets.all(20),
                      labelText: 'Password',
                      border: OutlineInputBorder(),
                      filled: true,
                      fillColor: Colors.white,
                    ),
                  ),
                  //create a login button with the color green and the same box size as above
                  SizedBox(height: 20.0),
                  ElevatedButton(
                    style: ElevatedButton.styleFrom(
                      backgroundColor: Colors.green,
                      side: BorderSide(color: Colors.black),
                      shape: RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(30.0),
                      ),
                      minimumSize: Size(double.infinity, 50),
                    ),
                    onPressed: () {
                      // Navigator.push(
                      //   context,
                      //   MaterialPageRoute(builder: (context) => const HomeScreen()),
                      // );
                      //show a toast message when login success
                    },
                    child: Text(
                      'login',
                      style: TextStyle(
                        color: Colors.white,
                        fontSize: 20,
                      ),
                    ),
                  ),
                  const Text(
                    'Or',
                    style: TextStyle(fontSize: 18, color: Colors.white),
                    textAlign: TextAlign.center,
                  ),
                  ElevatedButton(
                    style: ElevatedButton.styleFrom(
                      backgroundColor: Colors.green,
                      side: BorderSide(color: Colors.black),
                      shape: RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(30.0),
                      ),
                      minimumSize: Size(double.infinity, 50),
                    ),
                    onPressed: () {
                      //navigator bla bla bla
                    },
                    child: Text(
                      'login as a guest',
                      style: TextStyle(
                        color: Colors.white,
                        fontSize: 20,
                      ),
                    ),
                  ),
                  Row(
                    mainAxisAlignment: MainAxisAlignment.center,
                    children: [
                      Text('Create an account ?'),
                      TextButton(onPressed: () {}, child: Text('Register'))
                    ],
                  )
                ],
              ),
            )
          ],
        ),
      ),
    ));
  }
}
