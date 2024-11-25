import 'package:flutter/material.dart';
import 'package:shimmer/shimmer.dart';

class CategoryButton extends StatefulWidget {
  final String text;
  final VoidCallback onPressed;
  final String backgroundImage;
  final double width;
  final double height;

  const CategoryButton({
    Key? key,
    required this.text,
    required this.onPressed,
    required this.backgroundImage,
    this.width = 150,
    this.height = 100,
  }) : super(key: key);

  @override
  _CategoryButtonState createState() => _CategoryButtonState();
}

class _CategoryButtonState extends State<CategoryButton> {
  bool _isPressed = false;

  void _activateShimmer() {
    setState(() => _isPressed = true);
    Future.delayed(const Duration(milliseconds: 200), () {
      // Deactivate shimmer shortly after the press
      setState(() => _isPressed = false);
    });
  }

  @override
  Widget build(BuildContext context) {
    return GestureDetector(
      onTap: () {
        _activateShimmer();
        widget.onPressed(); // Trigger the onPressed callback
      },
      child: Stack(
        children: [
          // Background Image
          Container(
            width: widget.width,
            height: widget.height,
            decoration: BoxDecoration(
              image: DecorationImage(
                image: AssetImage(widget.backgroundImage),
                fit: BoxFit.cover,
              ),
              borderRadius: BorderRadius.circular(15),
              boxShadow: [
                BoxShadow(
                  color: Colors.black.withOpacity(0.2),
                  blurRadius: 5,
                  offset: const Offset(0, 2),
                ),
              ],
            ),
          ),
          // Shimmer Effect during click
          if (_isPressed)
            Positioned.fill(
              child: Shimmer.fromColors(
                baseColor: Colors.white.withOpacity(0.3),
                highlightColor: Colors.white.withOpacity(0.6),
                child: Container(
                  color: Colors.white,
                ),
              ),
            ),
          // Text
          Positioned.fill(
            child: Center(
              child: Text(
                widget.text,
                style: const TextStyle(
                  color: Colors.white,
                  fontSize: 20,
                  fontWeight: FontWeight.bold,
                ),
              ),
            ),
          ),
        ],
      ),
    );
  }
}
