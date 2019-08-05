<?php
/**
 * Tests for the common functions.
 *
 * @group common
 * @group functions
 */

class BBP_Tests_Common_Functions extends BBP_UnitTestCase {

	/**
	 * @covers ::bbp_number_format
	 * @todo   Implement test_bbp_number_format().
	 */
	public function test_bbp_number_format() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_number_format_i18n
	 * @todo   Implement test_bbp_number_format_i18n().
	 */
	public function test_bbp_number_format_i18n() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_convert_date
	 * @todo   Implement test_bbp_convert_date().
	 */
	public function test_bbp_convert_date() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_time_since
	 * @covers ::bbp_get_time_since
	 */
	public function test_bbp_time_since_years_months() {
		$now = time();
		$then = $now - ( 3 * YEAR_IN_SECONDS ) - ( 3 * 30 * DAY_IN_SECONDS );
		$since = '3 years, 3 months ago';

		// Output.
		$this->expectOutputString( $since );
		bbp_time_since( $then, $now );

		// Formatted.
		$this->assertEquals( $since, bbp_get_time_since( $then, $now ) );
	}

	/**
	 * @covers ::bbp_time_since
	 * @covers ::bbp_get_time_since
	 */
	public function test_bbp_time_since_year_month() {
		$now = time();
		$then = $now - YEAR_IN_SECONDS - ( 1 * 30 * DAY_IN_SECONDS );
		$since = '1 year, 1 month ago';

		// Output.
		$this->expectOutputString( $since );
		bbp_time_since( $then, $now );

		// Formatted.
		$this->assertEquals( $since, bbp_get_time_since( $then, $now ) );
	}

	/**
	 * @covers ::bbp_time_since
	 * @covers ::bbp_get_time_since
	 */
	public function test_bbp_time_since_years_nomonths() {
		$now = time();
		$then = $now - ( 3 * YEAR_IN_SECONDS );
		$since = '3 years ago';

		// Output.
		$this->expectOutputString( $since );
		bbp_time_since( $then, $now );

		// Formatted.
		$this->assertEquals( $since, bbp_get_time_since( $then, $now ) );
	}

	/**
	 * @covers ::bbp_time_since
	 * @covers ::bbp_get_time_since
	 */
	public function test_bbp_time_since_year_nomonths() {
		$now = time();
		$then = $now - YEAR_IN_SECONDS ;
		$since = '1 year ago';

		// Output.
		$this->expectOutputString( $since );
		bbp_time_since( $then, $now );

		// Formatted.
		$this->assertEquals( $since, bbp_get_time_since( $then, $now ) );
	}

	/**
	 * @covers ::bbp_time_since
	 * @covers ::bbp_get_time_since
	 */
	public function test_bbp_time_since_months_weeks() {
		$now = time();
		$then = $now - ( 3 * 30 * DAY_IN_SECONDS ) - ( 3 * WEEK_IN_SECONDS );
		$since = '3 months, 3 weeks ago';

		// Output.
		$this->expectOutputString( $since );
		bbp_time_since( $then, $now );

		// Formatted.
		$this->assertEquals( $since, bbp_get_time_since( $then, $now ) );
	}

	/**
	 * @covers ::bbp_time_since
	 * @covers ::bbp_get_time_since
	 */
	public function test_bbp_time_since_month_week() {
		$now = time();
		$then = $now - ( 1 * 30 * DAY_IN_SECONDS ) - ( 1 * WEEK_IN_SECONDS );
		$since = '1 month, 1 week ago';

		// Output.
		$this->expectOutputString( $since );
		bbp_time_since( $then, $now );

		// Formatted.
		$this->assertEquals( $since, bbp_get_time_since( $then, $now ) );
	}

	/**
	 * @covers ::bbp_time_since
	 * @covers ::bbp_get_time_since
	 */
	public function test_bbp_time_since_months_noweeks() {
		$now = time();
		$then = $now - ( 3 * 30 * DAY_IN_SECONDS );
		$since = '3 months ago';

		// Output.
		$this->expectOutputString( $since );
		bbp_time_since( $then, $now );

		// Formatted.
		$this->assertEquals( $since, bbp_get_time_since( $then, $now ) );
	}

	/**
	 * @covers ::bbp_time_since
	 * @covers ::bbp_get_time_since
	 */
	public function test_bbp_time_since_month_noweeks() {
		$now = time();
		$then = $now - ( 1 * 30 * DAY_IN_SECONDS );
		$since = '1 month ago';

		// Output.
		$this->expectOutputString( $since );
		bbp_time_since( $then, $now );

		// Formatted.
		$this->assertEquals( $since, bbp_get_time_since( $then, $now ) );
	}

	/**
	 * @covers ::bbp_time_since
	 * @covers ::bbp_get_time_since
	 */
	public function test_bbp_time_since_weeks_days() {
		$now = time();
		$then = $now - ( 3 * WEEK_IN_SECONDS ) - ( 3 * DAY_IN_SECONDS );
		$since = '3 weeks, 3 days ago';

		// Output.
		$this->expectOutputString( $since );
		bbp_time_since( $then, $now );

		// Formatted.
		$this->assertEquals( $since, bbp_get_time_since( $then, $now ) );
	}

	/**
	 * @covers ::bbp_time_since
	 * @covers ::bbp_get_time_since
	 */
	public function test_bbp_time_since_week_day() {
		$now = time();
		$then = $now - ( 1 * WEEK_IN_SECONDS ) - ( 1 * DAY_IN_SECONDS );
		$since = '1 week, 1 day ago';

		// Output.
		$this->expectOutputString( $since );
		bbp_time_since( $then, $now );

		// Formatted.
		$this->assertEquals( $since, bbp_get_time_since( $then, $now ) );
	}

	/**
	 * @covers ::bbp_time_since
	 * @covers ::bbp_get_time_since
	 */
	public function test_bbp_time_since_weeks_nodays() {
		$now = time();
		$then = $now - ( 3 * WEEK_IN_SECONDS );
		$since = '3 weeks ago';

		// Output.
		$this->expectOutputString( $since );
		bbp_time_since( $then, $now );

		// Formatted.
		$this->assertEquals( $since, bbp_get_time_since( $then, $now ) );
	}

	/**
	 * @covers ::bbp_time_since
	 * @covers ::bbp_get_time_since
	 */
	public function test_bbp_time_since_week_nodays() {
		$now = time();
		$then = $now - ( 1 * WEEK_IN_SECONDS );
		$since = '1 week ago';

		// Output.
		$this->expectOutputString( $since );
		bbp_time_since( $then, $now );

		// Formatted.
		$this->assertEquals( $since, bbp_get_time_since( $then, $now ) );
	}

	/**
	 * @covers ::bbp_time_since
	 * @covers ::bbp_get_time_since
	 */
	public function test_bbp_time_since_days_hours() {
		$now = time();
		$then = $now - ( 3 * DAY_IN_SECONDS ) - ( 3 * HOUR_IN_SECONDS );
		$since = '3 days, 3 hours ago';

		// Output.
		$this->expectOutputString( $since );
		bbp_time_since( $then, $now );

		// Formatted.
		$this->assertEquals( $since, bbp_get_time_since( $then, $now ) );
	}

	/**
	 * @covers ::bbp_time_since
	 * @covers ::bbp_get_time_since
	 */
	public function test_bbp_time_since_day_hour() {
		$now = time();
		$then = $now - ( 1 * DAY_IN_SECONDS ) - ( 1 * HOUR_IN_SECONDS );
		$since = '1 day, 1 hour ago';

		// Output.
		$this->expectOutputString( $since );
		bbp_time_since( $then, $now );

		// Formatted.
		$this->assertEquals( $since, bbp_get_time_since( $then, $now ) );
	}

	/**
	 * @covers ::bbp_time_since
	 * @covers ::bbp_get_time_since
	 */
	public function test_bbp_time_since_days_nohours() {
		$now = time();
		$then = $now - ( 3 * DAY_IN_SECONDS );
		$since = '3 days ago';

		// Output.
		$this->expectOutputString( $since );
		bbp_time_since( $then, $now );

		// Formatted.
		$this->assertEquals( $since, bbp_get_time_since( $then, $now ) );
	}

	/**
	 * @covers ::bbp_time_since
	 * @covers ::bbp_get_time_since
	 */
	public function test_bbp_time_since_day_nohours() {
		$now = time();
		$then = $now - ( 1 * DAY_IN_SECONDS );
		$since = '1 day ago';

		// Output.
		$this->expectOutputString( $since );
		bbp_time_since( $then, $now );

		// Formatted.
		$this->assertEquals( $since, bbp_get_time_since( $then, $now ) );
	}

	/**
	 * @covers ::bbp_time_since
	 * @covers ::bbp_get_time_since
	 */
	public function test_bbp_time_since_hours_minutes() {
		$now = time();
		$then = $now - ( 3 * HOUR_IN_SECONDS ) - ( 3 * MINUTE_IN_SECONDS );
		$since = '3 hours, 3 minutes ago';

		// Output.
		$this->expectOutputString( $since );
		bbp_time_since( $then, $now );

		// Formatted.
		$this->assertEquals( $since, bbp_get_time_since( $then, $now ) );
	}

	/**
	 * @covers ::bbp_time_since
	 * @covers ::bbp_get_time_since
	 */
	public function test_bbp_time_since_hour_minute() {
		$now = time();
		$then = $now - ( 1 * HOUR_IN_SECONDS ) - ( 1 * MINUTE_IN_SECONDS );
		$since = '1 hour, 1 minute ago';

		// Output.
		$this->expectOutputString( $since );
		bbp_time_since( $then, $now );

		// Formatted.
		$this->assertEquals( $since, bbp_get_time_since( $then, $now ) );
	}

	/**
	 * @covers ::bbp_time_since
	 * @covers ::bbp_get_time_since
	 */
	public function test_bbp_time_since_hours_nominutes() {
		$now = time();
		$then = $now - ( 3 * HOUR_IN_SECONDS );
		$since = '3 hours ago';

		// Output.
		$this->expectOutputString( $since );
		bbp_time_since( $then, $now );

		// Formatted.
		$this->assertEquals( $since, bbp_get_time_since( $then, $now ) );
	}

	/**
	 * @covers ::bbp_time_since
	 * @covers ::bbp_get_time_since
	 */
	public function test_bbp_time_since_hour_nominutes() {
		$now = time();
		$then = $now - ( 1 * HOUR_IN_SECONDS );
		$since = '1 hour ago';

		// Output.
		$this->expectOutputString( $since );
		bbp_time_since( $then, $now );

		// Formatted.
		$this->assertEquals( $since, bbp_get_time_since( $then, $now ) );
	}
	/**
	 * @covers ::bbp_time_since
	 * @covers ::bbp_get_time_since
	 */
	public function test_bbp_time_since_minutes_seconds() {
		$now = time();
		$then = $now - ( 3 * MINUTE_IN_SECONDS ) - 3;
		$since = '3 minutes ago';

		// Output.
		$this->expectOutputString( $since );
		bbp_time_since( $then, $now );

		// Formatted.
		$this->assertEquals( $since, bbp_get_time_since( $then, $now ) );
	}

	/**
	 * @covers ::bbp_time_since
	 * @covers ::bbp_get_time_since
	 */
	public function test_bbp_time_since_minutes_noseconds() {
		$now = time();
		$then = $now - ( 3 * MINUTE_IN_SECONDS );
		$since = '3 minutes ago';

		// Output.
		$this->expectOutputString( $since );
		bbp_time_since( $then, $now );

		// Formatted.
		$this->assertEquals( $since, bbp_get_time_since( $then, $now ) );
	}

	/**
	 * @covers ::bbp_time_since
	 * @covers ::bbp_get_time_since
	 */
	public function test_bbp_time_since_minute_noseconds() {
		$now = time();
		$then = $now - ( 1 * MINUTE_IN_SECONDS );
		$since = '1 minute ago';

		// Output.
		$this->expectOutputString( $since );
		bbp_time_since( $then, $now );

		// Formatted.
		$this->assertEquals( $since, bbp_get_time_since( $then, $now ) );
	}

	/**
	 * @covers ::bbp_time_since
	 * @covers ::bbp_get_time_since
	 */
	public function test_bbp_time_since_seconds() {
		$now = time();
		$then = $now - 3;
		$since = '3 seconds ago';

		// Output.
		$this->expectOutputString( $since );
		bbp_time_since( $then, $now );

		// Formatted.
		$this->assertEquals( $since, bbp_get_time_since( $then, $now ) );
	}

	/**
	 * @covers ::bbp_time_since
	 * @covers ::bbp_get_time_since
	 */
	public function test_bbp_time_since_second() {
		$now = time();
		$then = $now - 1;
		$since = '1 second ago';

		// Output.
		$this->expectOutputString( $since );
		bbp_time_since( $then, $now );

		// Formatted.
		$this->assertEquals( $since, bbp_get_time_since( $then, $now ) );
	}

	/**
	 * @covers ::bbp_time_since
	 * @covers ::bbp_get_time_since
	 */
	public function test_bbp_time_since_rightnow() {
		$now = time();
		$then = $now;
		$since = 'right now';

		// Output.
		$this->expectOutputString( $since );
		bbp_time_since( $then, $now );

		// Formatted.
		$this->assertEquals( $since, bbp_get_time_since( $then, $now ) );
	}

	/**
	 * @covers ::bbp_time_since
	 * @covers ::bbp_get_time_since
	 */
	public function test_bbp_time_since_future() {
		$now = time();
		$then = $now + 100;
		$since = 'sometime ago';

		// Output.
		$this->expectOutputString( $since );
		bbp_time_since( $then, $now );

		// Formatted.
		$this->assertEquals( $since, bbp_get_time_since( $then, $now ) );
	}

	/**
	 * @covers ::bbp_time_since
	 * @covers ::bbp_get_time_since
	 */
	public function test_bbp_time_since_timezone_minute_ago() {
		$now = time();
		$then = $now - ( 1 * MINUTE_IN_SECONDS );
		$since = '1 minute ago';

		// Backup timezone.
		$tz_backup = date_default_timezone_get();

		// Set timezone to something other than UTC.
		date_default_timezone_set( 'Europe/Paris' );

		// Output.
		$this->expectOutputString( $since );
		bbp_time_since( $then, $now );

		// Formatted.
		$this->assertSame( $since, bbp_get_time_since( $then, $now, $gmt = false ) );

		// Revert timezone back to normal.
		if ( $tz_backup ) {
			date_default_timezone_set( $tz_backup );
		}
	}

	/**
	 * @covers ::bbp_time_since
	 * @covers ::bbp_get_time_since
	 */
	public function test_bbp_time_since_timezone() {
		$now = time();
		$then = $now - ( 1 * HOUR_IN_SECONDS );
		$since = '1 hour ago';

		// Backup timezone.
		$tz_backup = date_default_timezone_get();

		// Set timezone to something other than UTC.
		date_default_timezone_set( 'Europe/Paris' );

		// Output.
		$this->expectOutputString( $since );
		bbp_time_since( $then, $now );

		// Formatted.
		$this->assertSame( $since, bbp_get_time_since( $then, $now, true ) );

		// Revert timezone back to normal.
		if ( $tz_backup ) {
			date_default_timezone_set( $tz_backup );
		}
	}

	/**
	 * @covers ::bbp_format_revision_reason
	 * @todo   Implement test_bbp_format_revision_reason().
	 */
	public function test_bbp_format_revision_reason() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_get_redirect_to
	 * @todo   Implement test_bbp_get_redirect_to().
	 */
	public function test_bbp_get_redirect_to() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_add_view_all
	 * @todo   Implement test_bbp_add_view_all().
	 */
	public function test_bbp_add_view_all() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_remove_view_all
	 * @todo   Implement test_bbp_remove_view_all().
	 */
	public function test_bbp_remove_view_all() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_get_view_all
	 * @todo   Implement test_bbp_get_view_all().
	 */
	public function test_bbp_get_view_all() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_get_paged
	 * @todo   Implement test_bbp_get_paged().
	 */
	public function test_bbp_get_paged() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_fix_post_author
	 * @todo   Implement test_bbp_fix_post_author().
	 */
	public function test_bbp_fix_post_author() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @group  locking
	 * @covers ::bbp_past_edit_lock
	 */
	public function test_bbp_past_edit_lock_before_5_minutes() {
		update_option( '_bbp_edit_lock', 5 );
		update_option( '_bbp_allow_content_edit', true );

		// Before
		$result = bbp_past_edit_lock( '4 minutes 59 seconds ago UTC' );
		$this->assertFalse( $result );
	}

	/**
	 * @group  locking
	 * @covers ::bbp_past_edit_lock
	 */
	public function test_bbp_past_edit_lock_on_5_minutes() {
		update_option( '_bbp_edit_lock', 5 );
		update_option( '_bbp_allow_content_edit', true );

		// On
		$result = bbp_past_edit_lock( '5 minutes ago UTC' );
		$this->assertTrue( $result );
	}

	/**
	 * @group  locking
	 * @covers ::bbp_past_edit_lock
	 */
	public function test_bbp_past_edit_lock_after_5_minutes() {
		update_option( '_bbp_edit_lock', 5 );
		update_option( '_bbp_allow_content_edit', true );

		// After
		$result = bbp_past_edit_lock( '5 minutes 1 second ago UTC' );
		$this->assertTrue( $result );
	}

	/**
	 * @group  locking
	 * @covers ::bbp_past_edit_lock
	 */
	public function test_bbp_past_edit_lock_before_0_minutes() {
		update_option( '_bbp_edit_lock', 0 );
		update_option( '_bbp_allow_content_edit', true );

		// Before
		$result = bbp_past_edit_lock( '4 minutes 59 seconds ago UTC' );
		$this->assertFalse( $result );
	}

	/**
	 * @group  locking
	 * @covers ::bbp_past_edit_lock
	 */
	public function test_bbp_past_edit_lock_on_0_minutes() {
		update_option( '_bbp_edit_lock', 0 );
		update_option( '_bbp_allow_content_edit', true );

		// On
		$result = bbp_past_edit_lock( '5 minutes ago UTC' );
		$this->assertFalse( $result );
	}

	/**
	 * @group  locking
	 * @covers ::bbp_past_edit_lock
	 */
	public function test_bbp_past_edit_lock_after_0_minutes() {
		update_option( '_bbp_edit_lock', 0 );
		update_option( '_bbp_allow_content_edit', true );

		// After
		$result = bbp_past_edit_lock( '5 minutes 1 second ago UTC' );
		$this->assertFalse( $result );
	}

	/**
	 * @covers ::bbp_get_statistics
	 * @todo   Implement test_bbp_get_statistics().
	 */
	public function test_bbp_get_statistics() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_filter_anonymous_post_data
	 * @todo   Implement test_bbp_filter_anonymous_post_data().
	 */
	public function test_bbp_filter_anonymous_post_data() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_check_for_duplicate
	 * @todo   Implement test_bbp_check_for_duplicate().
	 */
	public function test_bbp_check_for_duplicate() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_check_for_flood
	 * @todo   Implement test_bbp_check_for_flood().
	 */
	public function test_bbp_check_for_flood() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_check_for_moderation
	 */
	public function test_bbp_check_for_moderation() {
		$anonymous_data = false;
		$author_id      = 0;
		$title          = 'Sting';
		$content        = 'Beware, there maybe bees hibernating.';

		update_option( 'moderation_keys',"hibernating\nfoo" );

		$result = bbp_check_for_moderation( $anonymous_data, $author_id, $title, $content );

		$this->assertFalse( $result );

		update_option( 'moderation_keys',"foo\nbar" );

		$result = bbp_check_for_moderation( $anonymous_data, $author_id, $title, $content );

		$this->assertTrue( $result );
	}

	/**
	 * @covers ::bbp_check_for_moderation
	 */
	public function test_should_return_false_for_user_url_moderation_check() {
		$u = $this->factory->user->create( array(
			'user_url'   => 'http://example.net/banned',
		) );

		$t = $this->factory->topic->create( array(
			'post_author' => $u,
			'post_title' => 'Sting',
			'post_content' => 'Beware, there maybe bees hibernating.',
		) );

		$anonymous_data = false;
		$author_id      = bbp_get_topic_author_id( $t );
		$title          = bbp_get_topic_title( $t );
		$content        = bbp_get_topic_content( $t );

		update_option( 'moderation_keys',"http://example.net/banned\nfoo" );

		$result = bbp_check_for_moderation( $anonymous_data, $author_id, $title, $content );

		$this->assertFalse( $result );
	}

	/**
	 * @covers ::bbp_check_for_moderation
	 */
	public function test_should_return_false_for_user_email_moderation_check() {
		$u = $this->factory->user->create( array(
			'user_email' => 'banned@example.net',
		) );

		$t = $this->factory->topic->create( array(
			'post_author' => $u,
			'post_title' => 'Sting',
			'post_content' => 'Beware, there maybe bees hibernating.',
		) );

		$anonymous_data = false;
		$author_id      = bbp_get_topic_author_id( $t );
		$title          = bbp_get_topic_title( $t );
		$content        = bbp_get_topic_content( $t );

		update_option( 'moderation_keys',"banned@example.net\nfoo" );

		$result = bbp_check_for_moderation( $anonymous_data, $author_id, $title, $content );

		$this->assertFalse( $result );
	}

	/**
	 * @covers ::bbp_check_for_moderation
	 */
	public function test_should_return_false_for_user_ip_moderation_check() {
		$u = $this->factory->user->create();

		$t = $this->factory->topic->create( array(
			'post_author' => $u,
			'post_title' => 'Sting',
			'post_content' => 'Beware, there maybe bees hibernating.',
		) );

		$anonymous_data = false;
		$author_id      = bbp_get_topic_author_id( $t );
		$title          = bbp_get_topic_title( $t );
		$content        = bbp_get_topic_content( $t );

		update_option( 'moderation_keys',"127.0.0.1\nfoo" );

		$result = bbp_check_for_moderation( $anonymous_data, $author_id, $title, $content );

		$this->assertFalse( $result );
	}

	/**
	 * @covers ::bbp_check_for_moderation
	 */
	public function test_should_return_true_for_moderators_to_bypass_moderation_check() {
		// Create a moderator user.
		$this->old_current_user = get_current_user_id();
		$this->set_current_user( $this->factory->user->create( array( 'role' => 'subscriber' ) ) );
		$this->moderator_id = get_current_user_id();
		bbp_set_user_role( $this->moderator_id, bbp_get_moderator_role() );

		$t = $this->factory->topic->create( array(
			'post_author' => bbp_get_current_user_id(),
			'post_title' => 'Sting',
			'post_content' => 'Beware, there maybe bees hibernating.',
		) );

		$anonymous_data = false;
		$author_id      = bbp_get_topic_author_id( $t );
		$title          = bbp_get_topic_title( $t );
		$content        = bbp_get_topic_content( $t );

		update_option( 'moderation_keys',"hibernating\nfoo" );

		$result = bbp_check_for_moderation( $anonymous_data, $author_id, $title, $content );

		$this->assertTrue( $result );

		// Retore the original user.
		$this->set_current_user( $this->old_current_user );
	}

	/**
	 * @covers ::bbp_check_for_moderation
	 */
	public function test_should_return_false_when_link_count_exceeds_comment_max_links_setting() {
		$anonymous_data = false;
		$author_id      = 0;
		$title          = 'Sting';
		$content        = 'This is a post with <a href="http://example.com">multiple</a> <a href="http://bob.example.com">links</a>.';

		update_option( 'comment_max_links', 2 );
		$results = bbp_check_for_moderation( $anonymous_data, $author_id, $title, $content );
		$this->assertFalse( $results );
	}

	/**
	 * @covers ::bbp_check_for_moderation
	 */
	public function test_should_return_true_when_link_count_does_not_exceed_comment_max_links_setting() {
		$anonymous_data = false;
		$author_id      = 0;
		$title          = 'Sting';
		$content        = 'This is a post with <a href="http://example.com">multiple</a> <a href="http://bob.example.com">links</a>.';

		update_option( 'comment_max_links', 3 );
		$results = bbp_check_for_moderation( $anonymous_data, $author_id, $title, $content );
		$this->assertTrue( $results );
	}

	/**
	 * @covers ::bbp_check_for_moderation
	 */
	public function test_should_return_false_when_link_matches_moderation_keys() {
		$anonymous_data = false;
		$author_id      = 0;
		$title          = 'Sting';
		$content        = 'Beware, there maybe bees <a href="http://example.com/hibernating/>buzzing</a>, buzzing.';

		update_option( 'moderation_keys',"hibernating\nfoo" );

		$result = bbp_check_for_moderation( $anonymous_data, $author_id, $title, $content );

		$this->assertFalse( $result );
	}

	/**
	 * @covers ::bbp_check_for_moderation
	 */
	public function test_should_return_false_when_html_wrapped_content_matches_moderation_keys() {
		$u = $this->factory->user->create();

		$t = $this->factory->topic->create( array(
			'post_author' => $u,
			'post_title' => 'Sting',
			'post_content' => 'Beware, there maybe bees <strong>hiber</strong><em>nating</em>.',
		) );

		$anonymous_data = false;
		$author_id      = bbp_get_topic_author_id( $t );
		$title          = bbp_get_topic_title( $t );
		$content        = bbp_get_topic_content( $t );

		update_option( 'moderation_keys',"hibernating\nfoo" );

		$result = bbp_check_for_moderation( $anonymous_data, $author_id, $title, $content );

		$this->assertFalse( $result );
	}

	/**
	 * @covers ::bbp_check_for_moderation
	 */
	public function test_bbp_check_for_moderation_strict() {
		$anonymous_data = false;
		$author_id      = 0;
		$title          = 'Sting';
		$content        = 'Beware, they maybe bees hibernating.';

		update_option( 'blacklist_keys',"hibernating\nfoo" );

		$result = bbp_check_for_moderation( $anonymous_data, $author_id, $title, $content, true );

		$this->assertFalse( $result );

		update_option( 'blacklist_keys',"foo\nbar" );

		$result = bbp_check_for_moderation( $anonymous_data, $author_id, $title, $content, true );

		$this->assertTrue( $result );
	}

	/**
	 * @covers ::bbp_check_for_moderation
	 */
	public function test_should_return_false_for_user_url_strict_moderation_check() {
		$u = $this->factory->user->create( array(
			'user_url'   => 'http://example.net/banned',
		) );

		$t = $this->factory->topic->create( array(
			'post_author' => $u,
			'post_title' => 'Sting',
			'post_content' => 'Beware, there maybe bees hibernating.',
		) );

		$anonymous_data = false;
		$author_id      = bbp_get_topic_author_id( $t );
		$title          = bbp_get_topic_title( $t );
		$content        = bbp_get_topic_content( $t );

		update_option( 'blacklist_keys',"http://example.net/banned\nfoo" );

		$result = bbp_check_for_moderation( $anonymous_data, $author_id, $title, $content, true );

		$this->assertFalse( $result );
	}

	/**
	 * @covers ::bbp_check_for_moderation
	 */
	public function test_should_return_false_for_user_email_strict_moderation_check() {
		$u = $this->factory->user->create( array(
			'user_email' => 'banned@example.net',
		) );

		$t = $this->factory->topic->create( array(
			'post_author' => $u,
			'post_title' => 'Sting',
			'post_content' => 'Beware, there maybe bees hibernating.',
		) );

		$anonymous_data = false;
		$author_id      = bbp_get_topic_author_id( $t );
		$title          = bbp_get_topic_title( $t );
		$content        = bbp_get_topic_content( $t );

		update_option( 'blacklist_keys',"banned@example.net\nfoo" );

		$result = bbp_check_for_moderation( $anonymous_data, $author_id, $title, $content, true );

		$this->assertFalse( $result );
	}

	/**
	 * @covers ::bbp_check_for_moderation
	 */
	public function test_should_return_false_for_user_ip_strict_moderation_check() {
		$u = $this->factory->user->create();

		$t = $this->factory->topic->create( array(
			'post_author' => $u,
			'post_title' => 'Sting',
			'post_content' => 'Beware, there maybe bees hibernating.',
		) );

		$anonymous_data = false;
		$author_id      = bbp_get_topic_author_id( $t );
		$title          = bbp_get_topic_title( $t );
		$content        = bbp_get_topic_content( $t );

		update_option( 'blacklist_keys',"127.0.0.1\nfoo" );

		$result = bbp_check_for_moderation( $anonymous_data, $author_id, $title, $content, true );

		$this->assertFalse( $result );
	}

	/**
	 * @covers ::bbp_check_for_moderation
	 */
	public function test_should_return_false_for_moderators_to_bypass_strict_moderation_check() {
		// Create a moderator user.
		$this->old_current_user = get_current_user_id();
		$this->set_current_user( $this->factory->user->create( array( 'role' => 'subscriber' ) ) );
		$this->moderator_id = get_current_user_id();
		bbp_set_user_role( $this->moderator_id, bbp_get_moderator_role() );

		$t = $this->factory->topic->create( array(
			'post_author' => bbp_get_current_user_id(),
			'post_title' => 'Sting',
			'post_content' => 'Beware, there maybe bees hibernating.',
		) );

		$anonymous_data = false;
		$author_id      = bbp_get_topic_author_id( $t );
		$title          = bbp_get_topic_title( $t );
		$content        = bbp_get_topic_content( $t );

		update_option( 'blacklist_keys',"hibernating\nfoo" );

		$result = bbp_check_for_moderation( $anonymous_data, $author_id, $title, $content, true );

		$this->assertFalse( $result );

		// Retore the original user.
		$this->set_current_user( $this->old_current_user );
	}

	/**
	 * @covers ::bbp_check_for_moderation
	 */
	public function test_should_return_true_for_keymasterss_to_bypass_strict_moderation_check() {
		// Create a keymaster user.
		$this->old_current_user = get_current_user_id();
		$this->set_current_user( $this->factory->user->create( array( 'role' => 'subscriber' ) ) );
		$this->keymaster_id = get_current_user_id();
		bbp_set_user_role( $this->keymaster_id, bbp_get_keymaster_role() );

		$t = $this->factory->topic->create( array(
			'post_author' => bbp_get_current_user_id(),
			'post_title' => 'Sting',
			'post_content' => 'Beware, there maybe bees hibernating.',
		) );

		$anonymous_data = false;
		$author_id      = bbp_get_topic_author_id( $t );
		$title          = bbp_get_topic_title( $t );
		$content        = bbp_get_topic_content( $t );

		update_option( 'blacklist_keys',"hibernating\nfoo" );

		$result = bbp_check_for_moderation( $anonymous_data, $author_id, $title, $content, true );

		$this->assertTrue( $result );

		// Retore the original user.
		$this->set_current_user( $this->old_current_user );
	}

	/**
	 * @covers ::bbp_check_for_moderation
	 */
	public function test_should_return_false_when_link_matches_strict_moderation_keys() {
		$anonymous_data = false;
		$author_id      = 0;
		$title          = 'Sting';
		$content        = 'Beware, there maybe bees <a href="http://example.com/hibernating/>buzzing</a>, buzzing.';

		update_option( 'blacklist_keys',"hibernating\nfoo" );

		$result = bbp_check_for_moderation( $anonymous_data, $author_id, $title, $content, true );

		$this->assertFalse( $result );
	}

	/**
	 * @covers ::bbp_check_for_moderation
	 */
	public function test_should_return_false_when_html_wrapped_content_matches_strict_moderation_keys() {
		$u = $this->factory->user->create();

		$t = $this->factory->topic->create( array(
			'post_author' => $u,
			'post_title' => 'Sting',
			'post_content' => 'Beware, there maybe bees <strong>hiber</strong><em>nating</em>.',
		) );

		$anonymous_data = false;
		$author_id      = bbp_get_topic_author_id( $t );
		$title          = bbp_get_topic_title( $t );
		$content        = bbp_get_topic_content( $t );

		update_option( 'blacklist_keys',"hibernating\nfoo" );

		$result = bbp_check_for_moderation( $anonymous_data, $author_id, $title, $content, true );

		$this->assertFalse( $result );
	}

	/**
	 * @covers ::bbp_get_do_not_reply_address
	 */
	public function test_bbp_get_do_not_reply_address() {

		$_SERVER['SERVER_NAME'] = 'example.org';
		$address = bbp_get_do_not_reply_address();
		$this->assertEquals( 'noreply@example.org', $address );

		$_SERVER['SERVER_NAME'] = 'www.example.org';
		$address = bbp_get_do_not_reply_address();
		$this->assertEquals( 'noreply@example.org', $address );

		$_SERVER['SERVER_NAME'] = 'subdomain.example.org';
		$address = bbp_get_do_not_reply_address();
		$this->assertEquals( 'noreply@subdomain.example.org', $address );

		$_SERVER['SERVER_NAME'] = 'www.subdomain.example.org';
		$address = bbp_get_do_not_reply_address();
		$this->assertEquals( 'noreply@subdomain.example.org', $address );

		// Reset server name.
		$_SERVER['SERVER_NAME'] = 'example.org';
	}

	/**
	 * @covers ::bbp_notify_topic_subscribers
	 * @todo   Implement test_bbp_notify_topic_subscribers().
	 */
	public function test_bbp_notify_topic_subscribers() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_notify_forum_subscribers
	 * @todo   Implement test_bbp_notify_forum_subscribers().
	 */
	public function test_bbp_notify_forum_subscribers() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_notify_subscribers
	 * @todo   Implement test_bbp_notify_subscribers().
	 */
	public function test_bbp_notify_subscribers() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_logout_url
	 * @todo   Implement test_bbp_logout_url().
	 */
	public function test_bbp_logout_url() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_parse_args
	 * @todo   Implement test_bbp_parse_args().
	 */
	public function test_bbp_parse_args() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_get_global_post_field
	 * @todo   Implement test_bbp_get_global_post_field().
	 */
	public function test_bbp_get_global_post_field() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_verify_nonce_request
	 * @todo   Implement test_bbp_verify_nonce_request().
	 */
	public function test_bbp_verify_nonce_request() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_request_feed_trap
	 * @todo   Implement test_bbp_request_feed_trap().
	 */
	public function test_bbp_request_feed_trap() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_get_page_by_path
	 * @todo   Implement test_bbp_get_page_by_path().
	 */
	public function test_bbp_get_page_by_path() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_set_404
	 * @todo   Implement test_bbp_set_404().
	 */
	public function test_bbp_set_404() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}
}
