<?php

declare(strict_types=1);

namespace Drupal\Tests\tour\FunctionalJavascript;

use Drupal\Core\Url;
use Drupal\FunctionalJavascriptTests\WebDriverTestBase;

/**
 * General Tour tests that require JavaScript.
 *
 * @group tour
 */
class TourJavascriptTest extends WebDriverTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'node',
    'path_alias',
    'path',
    'tour',
    'tour_test',
    'toolbar',
  ];

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();

    $admin_user = $this->drupalCreateUser([
      'access toolbar',
      'access tour',
      'bypass node access',
      'administer nodes',
      'create url aliases',
    ]);
    $this->drupalLogin($admin_user);
  }

  /**
   * Confirm the 'tips' and 'tour 'query arguments.
   *
   * @throws \Behat\Mink\Exception\ResponseTextException
   * @throws \Behat\Mink\Exception\ElementHtmlException
   */
  public function testQueryArg() {
    $assert_session = $this->assertSession();

    $this->drupalGet('tour-test-1');
    $assert_session->assertNoElementAfterWait('css', '.tip-tour-test-1');
    $assert_session->pageTextContains('Where does the rain in Spain fail?');
    $assert_session->pageTextNotContains('Im all these things');
    $assert_session->pageTextNotContains('The first tip');

    $this->drupalGet('tour-test-1', [
      'query' => [
        'tour' => 1,
        'tips' => 'tip-tour-test-6',
      ],
    ]);
    $this->assertNotNull($assert_session->waitForElementVisible('css', '.tip-tour-test-6'));
    $assert_session->pageTextContains('Im all these things');

    $this->drupalGet('tour-test-1', [
      'query' => [
        'tour' => '1',
      ],
    ]);
    $this->assertNotNull($assert_session->waitForElementVisible('css', '.tip-tour-test-1'));
    $assert_session->pageTextContains('The first tip');
  }

  /**
   * Tests stepping through a tour.
   *
   * @throws \Behat\Mink\Exception\ElementHtmlException
   * @throws \Behat\Mink\Exception\ResponseTextException
   * @throws \Behat\Mink\Exception\ElementNotFoundException
   */
  public function testGeneralTourUse() {
    $page = $this->getSession()->getPage();
    $assert_session = $this->assertSession();

    $this->drupalGet(Url::fromRoute('tour_test.1'));

    $assert_session->assertNoElementAfterWait('css', '.tip-tour-test-1');

    // Open the tour.
    $page->find('css', '.js-tour-start-toolbar')->press();

    // Confirm the tour can be cancelled.
    $tip_to_close = $assert_session->waitForElementVisible('css', '.shepherd-enabled.tip-tour-test-1');
    $this->assertNotNull($tip_to_close);
    $tip_text = $tip_to_close->getText();
    $this->assertStringContainsString('always the best dressed', $tip_text);
    $this->assertStringContainsString('1 of 3', $tip_text);
    $this->assertStringNotContainsString('End tour', $tip_text);

    // Cancel the tour.
    $tip_to_close->find('css', '.shepherd-cancel-icon')->press();
    $assert_session->assertNoElementAfterWait('css', '.tip-tour-test-1');
    $assert_session->assertNoElementAfterWait('css', '.shepherd-enabled');

    // Navigate through the three steps of the tour.
    $page->find('css', '.js-tour-start-toolbar')->press();
    $tip1 = $assert_session->waitForElementVisible('css', '.shepherd-enabled.tip-tour-test-1');
    $this->assertNotNull($tip1);

    // Click the next button.
    $tip1->find('css', '.button--primary:contains("Next")')->press();

    // The second tour tip should appear, confirm it has the expected content.
    $tip2 = $assert_session->waitForElementVisible('css', '.shepherd-enabled.tip-tour-test-3');
    $assert_session->pageTextNotContains('always the best dressed');
    $tip_text = $tip2->getText();
    $this->assertStringContainsString('The awesome image', $tip_text);
    $this->assertStringContainsString('2 of 3', $tip_text);
    $this->assertStringNotContainsString('End tour', $tip_text);

    // Click the next button.
    $tip2->find('css', '.button--primary:contains("Next")')->press();

    // Click the previous button.
    $tip3 = $assert_session->waitForElementVisible('css', '.shepherd-enabled.tip-tour-test-6');
    $tip3->find('css', '.button--secondary:contains("Previous")')->press();

    // The secondary tour tip should appear.
    $tip2 = $assert_session->waitForElementVisible('css', '.shepherd-enabled.tip-tour-test-3');
    $tip_text = $tip2->getText();
    $this->assertStringContainsString('2 of 3', $tip_text);
    $tip2->find('css', '.button--primary:contains("Next")')->press();

    // The third tour tip should appear, confirm it has the expected content.
    $tip3 = $assert_session->waitForElementVisible('css', '.shepherd-enabled.tip-tour-test-6');
    $assert_session->pageTextNotContains('The awesome image');
    $tip_text = $tip3->getText();
    $this->assertStringContainsString('Im all these things', $tip_text);
    $this->assertStringContainsString('3 of 3', $tip_text);
    $this->assertStringNotContainsString('Next', $tip_text);

    // The final tip should have a button to end the tour. Press and confirm all
    // tips removed.
    $tip3->find('css', '.button--primary:contains("End tour")')->press();
    $assert_session->assertNoElementAfterWait('css', '.shepherd-enabled');
    $assert_session->pageTextNotContains('The awesome image');

    // Test hidden content.
    $this->drupalCreateContentType(['type' => 'page']);
    $this->drupalGet('node/add/page');
    $assert_session->pageTextContains('URL alias');
    $this->assertSession()->fieldExists('edit-path-0-alias');
    $page->find('css', '.js-tour-start-toolbar')->press();
    $hidden_tip = $assert_session->waitForElementVisible('css', '.shepherd-enabled.tip-tour-test-7');
    $this->assertNotNull($hidden_tip);
    $tip_text = $hidden_tip->getText();
    $this->assertStringContainsString('Hidden tour item found!', $tip_text);
  }

}
