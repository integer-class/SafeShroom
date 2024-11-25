import 'package:flutter/material.dart';
import 'package:safeshroom/Style/FontStyle.dart';

class CustomSearchButton extends StatelessWidget {
  final VoidCallback onPressed;

  const CustomSearchButton({
    required this.onPressed,
    Key? key,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return ElevatedButton(
      onPressed: onPressed,
      style: ElevatedButton.styleFrom(
        backgroundColor: Colors.green,
        shape: RoundedRectangleBorder(
          borderRadius: BorderRadius.circular(410.0),
          
        ),
        minimumSize: const Size(100, 33),
      ),
      child: Padding(
        padding: const EdgeInsets.symmetric(horizontal: 10.0),
        child: Row(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            const SizedBox(
              width: 20,
              height: 30,
              child: Image(
                image: AssetImage('assets/magnifying-glass.png'),
              ),
            ),
            const SizedBox(width: 10),
             Text(
              'Search',
              style: ButtonTextStyle, // Replace with your custom text style
            ),
          ],
        ),
      ),
    );
  }
}
