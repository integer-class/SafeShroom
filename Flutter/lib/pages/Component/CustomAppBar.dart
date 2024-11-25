import 'package:flutter/material.dart';
import 'package:safeshroom/Style/FontStyle.dart';

class CustomAppBar extends StatelessWidget implements PreferredSizeWidget {
  final String title;
  
  final VoidCallback? onSettingsPressed;

  CustomAppBar({required this.title, this.onSettingsPressed, Key? key})
      : preferredSize = const Size.fromHeight(kToolbarHeight),
        super(key: key);

  @override
  final Size preferredSize;

  @override
  Widget build(BuildContext context) {
    return AppBar(
      leading: SizedBox(
        height: 50,
        width: 10,
        child: Image.asset('images/Logo1.png'),
      ),
      title: Text(
        title,
        style: SubtitleTextStyle2,
        textAlign: TextAlign.left,
      ),
      actions: [
        IconButton(
          onPressed: onSettingsPressed,
          icon: Image.asset("assets/Settings.png"),
        ),
      ],
      
    );
  }
}
