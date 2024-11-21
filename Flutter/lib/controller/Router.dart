import 'package:flutter/material.dart';
import 'package:go_router/go_router.dart';
import 'package:safeshroom/pages/Landingpage.dart';

enum CurrentTab {
  home('0'),
  catalogue('1'),
  scan('2'),
  profile('3');

  final String value;
  const CurrentTab(this.value);

  factory CurrentTab.fromIndex(int index) {
    return values.firstWhere(
      (value) => value.value == '$index',
      orElse: () => CurrentTab.home,
    );
  }
}

class Routeconstant {
  static const String home = '/home';
  static const String scan = '/Scan';

  static const String catalogue = '/catalogue';
  static const String profile = '/profile';
  static const String login = '/login';
  static const String signup = '/signup';
}

class AppRouter {
int TabIndex = 0;
  final GoRouter router = GoRouter(
    routes: [
      GoRoute(
        path: '/',
        builder: (context, state) => Landingpage(),
      ),
      GoRoute(
        path: '/Login',
        builder: (context, state) => Landingpage(),
      ),
      GoRoute(
        path: '/SignIn',
        builder: (context, state) => Landingpage(),
      ),
      // GoRoute(
      //   path: Routeconstant.home,
      //   builder: (context, state) {
          
      //   }
        
      // ),

      // name: RouteConstants.root,
      //   path: RouteConstants.rootPath,
      //   builder: (context, state) {
      //     final tabIndex =
      //         int.tryParse(state.pathParameters['root_tab'] ?? '') ?? 0;
      //     final tab = RootTab.fromIndex(tabIndex);

      //     if (tab == RootTab.history) {
      //       return const HistoryPage();
      //     }
      //     if (tab == RootTab.profile) {
      //       return const Profile();
      //     }
      //     return Homepage(
      //       key: state.pageKey,
      //       currentTab: tab,
      //     );
      //   },
      // GoRoute(
      //   path: '/Catalogue',
      //   builder: (context, state) => Cataloguepage(),
      // ),
      // GoRoute(
      //   path: '/Profile',
      //   builder: (context, state) => Profilepage(),
      // ),
      // GoRoute(
      //   path: '/Scanpage',
      //   builder: (context, state) => Scanpage(),
      // ),
    ],
  );
}
