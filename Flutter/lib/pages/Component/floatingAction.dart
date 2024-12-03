import 'package:flutter/material.dart';
import 'package:safeshroom/services/ScanService.dart';

class floatingAction extends StatefulWidget {
  const floatingAction({Key? key}) : super(key: key);

  @override
  _floatingActionState createState() => _floatingActionState();
}

class _floatingActionState extends State<floatingAction> {
  bool isOptionsVisible = false;

  void _handleCameraOption(BuildContext context) {
    Scanservice().pickImageCamera(context); // Correct usage of context
  }

  void _handleGalleryOption(BuildContext context) {
    Scanservice().pickImage(context); // Correct usage of context
  }

  @override
  Widget build(BuildContext context) {
    return Stack(
      alignment: Alignment.topCenter,
      children: [
        // Camera Button
        if (isOptionsVisible)
          Row(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              // Gallery Button
              SizedBox(
                width: 50,
                height: 50,
                child: FloatingActionButton(
                  onPressed: () {
                    _handleGalleryOption(context); // Pass context here
                  },
                  child: const Icon(
                    Icons.photo_library,
                    color: Colors.white,
                    size: 24,
                  ),
                  backgroundColor: Colors.orange,
                  shape: const CircleBorder(),
                ),
              ),
              const SizedBox(width: 70.0),
              // Camera Button
              SizedBox(
                width: 50,
                height: 50,
                child: FloatingActionButton(
                  onPressed: () {
                    _handleCameraOption(context); // Pass context here
                  },
                  child: const Icon(
                    Icons.camera_alt,
                    color: Colors.white,
                    size: 24,
                  ),
                  backgroundColor: Colors.orange,
                  shape: const CircleBorder(),
                ),
              ),
            ],
          ),

        // Main FAB
        SizedBox(
          width: 65,
          height: 65,
          child: FloatingActionButton(
            onPressed: () {
              setState(() {
                isOptionsVisible = !isOptionsVisible; // Toggle visibility
              });
            },
            child: Icon(
              isOptionsVisible ? Icons.close : Icons.camera,
              size: 32,
              color: Colors.white,
            ),
            backgroundColor: Colors.orange,
            shape: RoundedRectangleBorder(
              borderRadius: BorderRadius.circular(50.0),
            ),
          ),
        ),
      ],
    );
  }
}
