import 'package:flutter/material.dart';
import 'package:go_router/go_router.dart';
import 'package:safeshroom/controller/current_tab.dart';
import 'package:safeshroom/controller/route_constants.dart';

class BottomNavbar extends StatelessWidget {
   final String currentTab;

  const BottomNavbar({
    super.key,
    required this.currentTab,
  });
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
                if (CurrentTab != CurrentTab.home) {
                  context.go(RouteConstants.home);
                }
              },
              child: Icon(
                Icons.home,
                color:
                    currentTab == RouteConstants.home ? Colors.black : Colors.blue,
              ),
            ),

            // catalogue Button
            MaterialButton(
              minWidth: 40,
              onPressed: () {
                if (CurrentTab != CurrentTab.catalogue) {
                  context.go(RouteConstants.catalogue);
                }
              },
              child: Icon(
                Icons.list,
                color: currentTab == RouteConstants.catalogue
                    ? Colors.black
                    : Colors.blue,
              ),
            ),

            // Add a spacer for the center FAB
            const SizedBox(width: 80),

            // Notification Button
            MaterialButton(
              minWidth: 40,
              onPressed: () {
                // context.go(RouteConstants.home);
              },
              child: Icon(
                Icons.notifications,
                color:
                    CurrentTab == CurrentTab.home ? Colors.black : Colors.blue,
              ),
            ),

            // Profile Button
            MaterialButton(
              minWidth: 40,
              onPressed: () {
                if (CurrentTab != CurrentTab.profile) {
                  GoRouter.of(context).go(RouteConstants.profile);
                }
              },
              child: const Icon(
                Icons.person,
                color: CurrentTab == CurrentTab.profile
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
