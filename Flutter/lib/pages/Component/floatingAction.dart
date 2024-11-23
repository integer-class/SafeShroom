import 'package:flutter/material.dart';

class floatingAction extends StatelessWidget {
  final VoidCallback onPressed;

  const floatingAction({Key? key, required this.onPressed}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return SizedBox(
      width: 80, // Mengatur ukuran FAB (lebar)
      height: 80, // Mengatur ukuran FAB (tinggi)
      child: FloatingActionButton(
        onPressed: onPressed,
        child: const Icon(
          Icons.camera_alt,
          size: 32, // Mengatur ukuran ikon
          color: Colors.white, // Warna ikon FAB
        ),
        backgroundColor: Colors.orange, // Warna latar belakang FAB
        shape: RoundedRectangleBorder(
          borderRadius:
              BorderRadius.circular(40), // Menentukan kelengkungan sudut
        ),
      ),
    );
  }
}
