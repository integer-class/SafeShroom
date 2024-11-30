import 'package:go_router/go_router.dart';
import 'package:safeshroom/pages/Home/HomePage.dart';
import 'package:safeshroom/pages/Catalogue/CataloguePage.dart';
import 'package:safeshroom/pages/Landing/LandingPage.dart';
import 'package:safeshroom/pages/Login/SignIn.dart';
import 'package:safeshroom/pages/Login/SignUp.dart';
import 'package:safeshroom/pages/Profile/ProfilePage.dart';
import 'package:safeshroom/pages/Summary/SummaryPage.dart';
import 'package:safeshroom/controller/route_constants.dart'; 

final GoRouter appRouter = GoRouter(
  routes: [
    GoRoute(
      path: RouteConstants.landing,
      builder: (context, state) => Landingpage(),
    ),
    GoRoute(
      path: RouteConstants.home,
      builder: (context, state) => Homepage(),
    ),
    GoRoute(
      path: RouteConstants.catalogue,
      builder: (context, state) => Cataloguepage(),
    ),
    GoRoute(
      path: RouteConstants.scan,
      builder: (context, state) => SummaryPage(),
    ),
    GoRoute(
      path: RouteConstants.profile,
      builder: (context, state) => Profilepage(),
    ),
    GoRoute(
      path: RouteConstants.signup,
      builder: (context, state) => Signup(),
    ),
    GoRoute(
      path: RouteConstants.signin,
      builder: (context, state) => Signin(),
    ),
    
  ],
);
