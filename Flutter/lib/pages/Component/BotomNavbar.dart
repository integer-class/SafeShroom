import 'package:flutter/material.dart';
import 'package:go_router/go_router.dart';
import 'package:safeshroom/controller/route_constants.dart';
import 'package:safeshroom/services/AuthService.dart';

class BottomNavbar extends StatelessWidget {
  final String currentTab;
  final AuthService _authService = AuthService();

  BottomNavbar({
    Key? key,
    required this.currentTab,
  }) : super(key: key);
  
  // New method to get the appropriate route based on login status
  Future<String> _getAppropriateRoute(String loggedInRoute, String guestRoute) async {
    bool isLoggedIn = await _authService.isLoggedIn();
    return isLoggedIn ? loggedInRoute : guestRoute;
  }

  @override
  Widget build(BuildContext context) {
    return BottomAppBar(
      shape: const CircularNotchedRectangle(),
      notchMargin: 8.0,
      child: SizedBox(
        height: 60,
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
              onPressed: () async {
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

            // History Button
            IconButton(
              onPressed: () async {
                if (currentTab != RouteConstants.history) {
                  String route = await _getAppropriateRoute(
                    RouteConstants.history, 
                    RouteConstants.guest_history
                  );
                  context.go(route);
                }
              },
              icon: Icon(
                Icons.history,
                size: 30,
                color: currentTab == RouteConstants.history ||
                        currentTab == RouteConstants.guest_history
                    ? Colors.black
                    : Colors.blue,
              ),
            ),

            // Profile Button
            IconButton(
              onPressed: () async {
                if (currentTab != RouteConstants.profile) {
                  String route = await _getAppropriateRoute(
                    RouteConstants.profile, 
                    RouteConstants.guest_profile
                  );
                  context.go(route);
                }
              },
              icon: Icon(
                Icons.person,
                size: 30,
                color: currentTab == RouteConstants.profile ||
                        currentTab == RouteConstants.guest_profile
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