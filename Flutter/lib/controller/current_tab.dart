enum CurrentTab {
  home('/home'),
  catalogue('/catalogue'),
  scan('/scan'),
  profile('/profile'),
  signin('/login');

  final String value;
  const CurrentTab(this.value);

  factory CurrentTab.fromIndex(int index) {
    return values.firstWhere(
      (tab) => tab.value == '$index',
      orElse: () => CurrentTab.home,
    );
  }
}
