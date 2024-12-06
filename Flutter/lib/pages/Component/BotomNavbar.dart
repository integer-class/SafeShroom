import 'package:flutter/material.dart';
import 'package:go_router/go_router.dart';
import 'package:safeshroom/controller/route_constants.dart';
import 'package:safeshroom/services/AuthService.dart';

class BottomNavbar extends StatelessWidget {
  final String currentTab;

  const BottomNavbar({
    Key? key,
    required this.currentTab,
  }) : super(key: key);

  
  @override
  Widget build(BuildContext context) {
    return BottomAppBar(
      shape: const CircularNotchedRectangle(),
      notchMargin: 8.0, // Adjusted for better visual spacing
      child: SizedBox(
        height: 60, // Consistent height for the navbar
        child: Row(
          mainAxisAlignment: MainAxisAlignment.spaceAround,
          children: [
            // Home Button
            IconButton(
              onPressed: () {
                if (currentTab != RouteConstants.home) {
                  context.go(RouteConstants.home);
                }
              },
              icon: Icon(
                Icons.home,
                size: 30,
                color: currentTab == RouteConstants.home
                    ? Colors.black
                    : Colors.blue,
              ),
            ),

            // Catalogue Button
            IconButton(
              onPressed: () {
                if (currentTab != RouteConstants.catalogue) {
                  context.go(RouteConstants.catalogue);
                }
              },
              icon: Icon(
                Icons.list,
                size: 30,
                color: currentTab == RouteConstants.catalogue
                    ? Colors.black
                    : Colors.blue,
              ),
            ),

            // Spacer for FAB
            const SizedBox(width: 60),

            // Notification Button
            IconButton(
              onPressed: () {
                if (currentTab != RouteConstants.history) {
                  context.go(RouteConstants.history);
                }
              },
              icon: Icon(
                Icons.history,
                size: 30,
                color: currentTab == RouteConstants.history
                    ? Colors.black
                    : Colors.blue,
              ),
            ),

            // Profile Button
            IconButton(
              onPressed: () {
                if (currentTab != RouteConstants.profile) {
                  context.go(RouteConstants.profile);
                }
              },
              icon: Icon(
                Icons.person,
                size: 30,
                color: currentTab == RouteConstants.profile
                    ? Colors.black
                    : Colors.blue,
              ),
            ),
          ],
        ),
      ),
    );
  }
}
