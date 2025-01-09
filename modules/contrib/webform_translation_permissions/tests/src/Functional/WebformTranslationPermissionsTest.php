<?php

namespace Drupal\Tests\webform_translation_permissions\Functional;

use Drupal\Tests\BrowserTestBase;
use Drupal\Tests\webform\Traits\WebformBrowserTestTrait;

/**
 * Contains tests for the Webform Translation Permissions module.
 *
 * @group webform_translation_permissions
 */
class WebformTranslationPermissionsTest extends BrowserTestBase {

  use WebformBrowserTestTrait;

  /**
   * {@inheritdoc}
   */
  protected static $modules = ['webform_translation_permissions'];

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * Admin user.
   *
   * @var \Drupal\user\Entity\User
   */
  protected $adminUser;

  /**
   * User with 'translate config' permission.
   *
   * @var \Drupal\user\Entity\User
   */
  protected $translateConfigUser;

  /**
   * User with 'translation own webform' permission.
   *
   * @var \Drupal\user\Entity\User
   */
  protected $translateOwnWebformUser;

  /**
   * User with 'translate any webform' permission.
   *
   * @var \Drupal\user\Entity\User
   */
  protected $translateAnyWebformUser;

  /**
   * User without translate config or translate webform permission.
   *
   * @var \Drupal\user\Entity\User
   */
  protected $user;

  /**
   * Webform.
   *
   * @var \Drupal\webform\WebformInterface
   */
  protected $webform1;

  /**
   * Webform.
   *
   * @var \Drupal\webform\WebformInterface
   */
  protected $webform2;

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();

    $this->adminUser = $this->createUser([], NULL, TRUE);
    $this->translateConfigUser = $this->createUser(['translate configuration']);
    $this->translateAnyWebformUser = $this->createUser(['translate any webform']);
    $this->translateOwnWebformUser = $this->createUser(['translate own webform']);
    $this->user = $this->createUser([]);

    $this->webform1 = $this->createWebform(['uid' => $this->translateOwnWebformUser->id()]);
    $this->webform2 = $this->createWebform();
  }

  /**
   * Test access to the webform translate page.
   */
  public function testWebformTranslationPermissionsAccess() {
    $this->drupalLogin($this->adminUser);

    $this->drupalGet(sprintf('/admin/structure/webform/manage/%s/translate', $this->webform1->id()));
    $this->assertSession()->statusCodeEquals(200);
    $this->drupalGet(sprintf('/admin/structure/webform/manage/%s/translate', $this->webform2->id()));
    $this->assertSession()->statusCodeEquals(200);

    $this->drupalLogin($this->translateConfigUser);
    $this->drupalGet(sprintf('/admin/structure/webform/manage/%s/translate', $this->webform1->id()));
    $this->assertSession()->statusCodeEquals(200);
    $this->drupalGet(sprintf('/admin/structure/webform/manage/%s/translate', $this->webform2->id()));
    $this->assertSession()->statusCodeEquals(200);

    $this->drupalLogin($this->translateAnyWebformUser);
    $this->drupalGet(sprintf('/admin/structure/webform/manage/%s/translate', $this->webform1->id()));
    $this->assertSession()->statusCodeEquals(200);
    $this->drupalGet(sprintf('/admin/structure/webform/manage/%s/translate', $this->webform2->id()));
    $this->assertSession()->statusCodeEquals(200);

    $this->drupalLogin($this->translateOwnWebformUser);
    $this->drupalGet(sprintf('/admin/structure/webform/manage/%s/translate', $this->webform1->id()));
    $this->assertSession()->statusCodeEquals(200);
    $this->drupalGet(sprintf('/admin/structure/webform/manage/%s/translate', $this->webform2->id()));
    $this->assertSession()->statusCodeEquals(403);

    $this->drupalLogin($this->user);
    $this->drupalGet(sprintf('/admin/structure/webform/manage/%s/translate', $this->webform1->id()));
    $this->assertSession()->statusCodeEquals(403);
    $this->drupalGet(sprintf('/admin/structure/webform/manage/%s/translate', $this->webform2->id()));
    $this->assertSession()->statusCodeEquals(403);
  }

}
