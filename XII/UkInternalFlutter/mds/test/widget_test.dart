import 'package:flutter_test/flutter_test.dart';
import 'package:mds/main.dart';
import 'package:mds/presentation/pages/landing/landing_page.dart';

void main() {
  testWidgets('App renders landing page correctly', (WidgetTester tester) async {
    await tester.pumpWidget(const MyApp());
    expect(find.byType(LandingPage), findsOneWidget);
    expect(find.text('MDS Publik'), findsOneWidget);
    expect(find.text('Login Admin'), findsOneWidget);
  });
}
