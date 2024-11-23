import 'package:flutter/material.dart';

class BottomNavbar extends StatelessWidget {
  const BottomNavbar({super.key});

  @override
  Widget build(BuildContext context) {
    return BottomAppBar(
      shape: const CircularNotchedRectangle(),
      notchMargin: 10,
      child: Container(
        height: 60,
        child: Row(
          mainAxisAlignment: MainAxisAlignment.spaceEvenly,
          children: [
            // Home Button
            MaterialButton(
              minWidth: 40,
              onPressed: () {
                // context.go('/home');
              },
              child: const Icon(
                Icons.home,
                color: Colors.black,
              ),
            ),
            
            // List Button
            MaterialButton(
              minWidth: 40,
              onPressed: () {
                // context.go('/Catalogue');
              },
              child: const Icon(
                Icons.list,
                color: Colors.black,
              ),
            ),

            // Add a spacer for the center FAB
            const SizedBox(width: 80),

            // Notification Button
            MaterialButton(
              minWidth: 40,
              onPressed: () {
                // context.go('/notification');
              },
              child: const Icon(
                Icons.notification_add,
                color: Colors.black,
              ),
            ),

            // Profile Button
            MaterialButton(
              minWidth: 40,
              onPressed: () {
                // context.go('/Scanner');
              },
              child: const Icon(
                Icons.person,
                color: Colors.black,
              ),
            ),
          ],
        ),
      ),
    );
  }
}