<?php

/**
 * Tests for the admin tools functions.
 *
 * @group tools
 */
class BBP_Tests_Admin_Tools extends BBP_UnitTestCase {
	protected $old_current_user = 0;

	public function setUp() {
		parent::setUp();
		$this->old_current_user = get_current_user_id();
		$this->set_current_user( $this->factory->user->create( array( 'role' => 'administrator' ) ) );
		$this->keymaster_id = get_current_user_id();

		bbp_set_user_role( $this->keymaster_id, bbp_get_keymaster_role() );

		if ( ! function_exists( 'bbp_admin_repair_page' ) ) {
			require_once BBP_PLUGIN_DIR . 'includes/admin/tools/repair.php';
			require_once BBP_PLUGIN_DIR . 'includes/admin/tools/upgrade.php';
		}
	}

	public function tearDown() {
		parent::tearDown();
		$this->set_current_user( $this->old_current_user );
	}

	/**
	 * @covers ::bbp_admin_repair
	 * @todo   Implement test_bbp_admin_repair().
	 */
	public function test_bbp_admin_repair() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_admin_repair_handler
	 * @todo   Implement test_bbp_admin_repair_handler().
	 */
	public function test_bbp_admin_repair_handler() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_admin_tools_repair_help
	 * @todo   Implement test_bbp_admin_tools_repair_help().
	 */
	public function test_bbp_admin_tools_repair_help() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_admin_tools_reset_help
	 * @todo   Implement test_bbp_admin_tools_reset_help().
	 */
	public function test_bbp_admin_tools_reset_help() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_admin_tools_converter_help
	 * @todo   Implement test_bbp_admin_tools_converter_help().
	 */
	public function test_bbp_admin_tools_converter_help() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_admin_tools_feedback
	 * @todo   Implement test_bbp_admin_tools_feedback().
	 */
	public function test_bbp_admin_tools_feedback() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_admin_repair_list
	 * @todo   Implement test_bbp_admin_repair_list().
	 */
	public function test_bbp_admin_repair_list() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_admin_repair_topic_reply_count
	 * @todo   Implement test_bbp_admin_repair_topic_reply_count().
	 */
	public function test_bbp_admin_repair_topic_reply_count() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_admin_repair_topic_voice_count
	 */
	public function test_bbp_admin_repair_topic_voice_count() {
		$u = $this->factory->user->create_many( 2 );

		$f = $this->factory->forum->create();

		$t = $this->factory->topic->create( array(
			'post_parent' => $f,
			'topic_meta' => array(
				'forum_id' => $f,
			),
		) );

		$r = $this->factory->reply->create( array(
			'post_author' => $u[0],
			'post_parent' => $t,
			'reply_meta' => array(
				'forum_id' => $f,
				'topic_id' => $t,
			),
		) );

		$r = $this->factory->reply->create( array(
			'post_author' => $u[1],
			'post_parent' => $t,
			'reply_meta' => array(
				'forum_id' => $f,
				'topic_id' => $t,
			),
		) );

		$count = bbp_get_topic_voice_count( $t );
		$this->assertSame( '3', $count );

		// Delete the topic _bbp_voice_count meta key.
		$this->assertTrue( delete_post_meta_by_key( '_bbp_voice_count' ) );

		$count = bbp_get_topic_voice_count( $t );
		$this->assertSame( '0', $count );

		// Repair the topic voice count meta.
		bbp_admin_repair_topic_voice_count();

		clean_post_cache( $t );

		$count = bbp_get_topic_voice_count( $t );
		$this->assertSame( '3', $count );
	}

	/**
	 * @covers ::bbp_admin_repair_topic_hidden_reply_count
	 */
	public function test_bbp_admin_repair_topic_hidden_reply_count() {

		$f = $this->factory->forum->create();

		$t = $this->factory->topic->create( array(
			'post_parent' => $f,
			'topic_meta' => array(
				'forum_id' => $f,
			),
		) );

		$r = $this->factory->reply->create( array(
			'post_parent' => $t,
			'reply_meta' => array(
				'forum_id' => $f,
				'topic_id' => $t,
			),
		) );

		$count = bbp_get_topic_reply_count( $t, true );
		$this->assertSame( 1, $count );

		$r = $this->factory->reply->create_many( 3, array(
			'post_parent' => $t,
			'reply_meta' => array(
				'forum_id' => $f,
				'topic_id' => $t,
			),
		) );

		bbp_spam_reply( $r[0] );
		bbp_unapprove_reply( $r[2] );

		$count = bbp_get_topic_reply_count_hidden( $t, true );
		$this->assertSame( 2, $count );

		// Delete the topic _bbp_reply_count_hidden meta key.
		$this->assertTrue( delete_post_meta_by_key( '_bbp_reply_count_hidden' ) );

		$count = bbp_get_topic_reply_count_hidden( $t, true );
		$this->assertSame( 0, $count );

		// Repair the topic hidden reply count meta.
		bbp_admin_repair_topic_hidden_reply_count();

		clean_post_cache( $t );

		$count = bbp_get_topic_reply_count_hidden( $t, true );
		$this->assertSame( 2, $count );
	}

	/**
	 * @covers ::bbp_admin_repair_group_forum_relationship
	 * @todo   Implement test_bbp_admin_repair_group_forum_relationship().
	 */
	public function test_bbp_admin_repair_group_forum_relationship() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_admin_repair_forum_topic_count
	 */
	public function test_bbp_admin_repair_forum_topic_count() {
		$c = $this->factory->forum->create( array(
			'forum_meta' => array(
				'forum_type' => 'category',
				'status'     => 'open',
			),
		) );

		$f = $this->factory->forum->create( array(
			'post_parent' => $c,
			'forum_meta' => array(
				'forum_id'   => $c,
				'forum_type' => 'forum',
				'status'     => 'open',
			),
		) );

		$t = $this->factory->topic->create( array(
			'post_parent' => $f,
			'topic_meta' => array(
				'forum_id' => $f,
			),
		) );

		$count = bbp_get_forum_topic_count( $f, true, true );
		$this->assertSame( 1, $count );

		$t = $this->factory->topic->create_many( 3, array(
			'post_parent' => $f,
			'topic_meta' => array(
				'forum_id' => $f,
			),
		) );

		bbp_update_forum_topic_count( $c );
		bbp_update_forum_topic_count( $f );

		// Category topic count.
		$count = bbp_get_forum_topic_count( $c, false, true );
		$this->assertSame( 0, $count );

		// Category total topic count.
		$count = bbp_get_forum_topic_count( $c, true, true );
		$this->assertSame( 4, $count );

		// Category topic count hidden.
		$count = bbp_get_forum_topic_count_hidden( $c, true );
		$this->assertSame( 0, $count );

		// Forum topic count.
		$count = bbp_get_forum_topic_count( $f, false, true );
		$this->assertSame( 4, $count );

		// Forum total topic count.
		$count = bbp_get_forum_topic_count( $f, true, true );
		$this->assertSame( 4, $count );

		// Forum topic count hidden.
		$count = bbp_get_forum_topic_count_hidden( $f, true );
		$this->assertSame( 0, $count );

		bbp_spam_topic( $t[0] );
		bbp_unapprove_topic( $t[2] );

		// Category topic count.
		$count = bbp_get_forum_topic_count( $c, false, true );
		$this->assertSame( 0, $count );

		// Category total topic count.
		$count = bbp_get_forum_topic_count( $c, true, true );
		$this->assertSame( 2, $count );

		// Category topic count hidden.
		$count = bbp_get_forum_topic_count_hidden( $c, true );
		$this->assertSame( 0, $count );

		// Forum topic count.
		$count = bbp_get_forum_topic_count( $f, false, true );
		$this->assertSame( 2, $count );

		// Forum total topic count.
		$count = bbp_get_forum_topic_count( $f, true, true );
		$this->assertSame( 2, $count );

		// Forum topic count hidden.
		$count = bbp_get_forum_topic_count_hidden( $f, true );
		$this->assertSame( 2, $count );

		// Delete the _bbp_total_topic_count meta key.
		$this->assertTrue( delete_post_meta_by_key( '_bbp_topic_count_hidden' ) );

		// Delete the _bbp_total_topic_count meta key.
		$this->assertTrue( delete_post_meta_by_key( '_bbp_total_topic_count' ) );

		// Delete the  _bbp_topic_count meta key.
		$this->assertTrue( delete_post_meta_by_key( '_bbp_topic_count' ) );

		// Category topic count.
		$count = bbp_get_forum_topic_count( $c, false, true );
		$this->assertSame( 0, $count );

		// Category total topic count.
		$count = bbp_get_forum_topic_count( $c, true, true );
		$this->assertSame( 0, $count );

		// Category topic count hidden.
		$count = bbp_get_forum_topic_count_hidden( $c, true );
		$this->assertSame( 0, $count );

		// Forum topic count.
		$count = bbp_get_forum_topic_count( $f, false, true );
		$this->assertSame( 0, $count );

		// Forum total topic count.
		$count = bbp_get_forum_topic_count( $f, true, true );
		$this->assertSame( 0, $count );

		// Forum topic count hidden.
		$count = bbp_get_forum_topic_count_hidden( $f, true );
		$this->assertSame( 0, $count );

		// Repair the forum topic count meta.
		bbp_admin_repair_forum_topic_count();

		// Category topic count.
		$count = bbp_get_forum_topic_count( $c, false, true );
		$this->assertSame( 0, $count );

		// Category total topic count.
		$count = bbp_get_forum_topic_count( $c, true, true );
		$this->assertSame( 2, $count );

		// Category topic count hidden.
		$count = bbp_get_forum_topic_count_hidden( $c, true );
		$this->assertSame( 0, $count );

		// Forum topic count.
		$count = bbp_get_forum_topic_count( $f, false, true );
		$this->assertSame( 2, $count );

		// Forum total topic count.
		$count = bbp_get_forum_topic_count( $f, true, true );
		$this->assertSame( 2, $count );

		// Forum topic count hidden.
		$count = bbp_get_forum_topic_count_hidden( $f, true );
		$this->assertSame( 2, $count );
	}

	/**
	 * @covers ::bbp_admin_repair_forum_reply_count
	 */
	public function test_bbp_admin_repair_forum_reply_count() {
		$c = $this->factory->forum->create( array(
			'forum_meta' => array(
				'forum_type' => 'category',
				'status'     => 'open',
			),
		) );

		$f = $this->factory->forum->create( array(
			'post_parent' => $c,
			'forum_meta' => array(
				'forum_id'   => $c,
				'forum_type' => 'forum',
				'status'     => 'open',
			),
		) );

		$t = $this->factory->topic->create( array(
			'post_parent' => $f,
			'topic_meta' => array(
				'forum_id' => $f,
			),
		) );

		$r = $this->factory->reply->create( array(
			'post_parent' => $t,
			'reply_meta' => array(
				'forum_id' => $f,
				'topic_id' => $t,
			),
		) );

		$count = bbp_get_forum_reply_count( $f, true, true );
		$this->assertSame( 1, $count );

		$r = $this->factory->reply->create_many( 3, array(
			'post_parent' => $t,
			'reply_meta' => array(
				'forum_id' => $f,
				'topic_id' => $t,
			),
		) );

		bbp_update_forum_reply_count( $c );
		bbp_update_forum_reply_count( $f );

		// Category reply count.
		$count = bbp_get_forum_reply_count( $c, false, true );
		$this->assertSame( 0, $count );

		// Category total reply count.
		$count = bbp_get_forum_reply_count( $c, true, true );
		$this->assertSame( 4, $count );

		// Forum reply count.
		$count = bbp_get_forum_reply_count( $f, false, true );
		$this->assertSame( 4, $count );

		// Forum total reply count.
		$count = bbp_get_forum_reply_count( $f, true, true );
		$this->assertSame( 4, $count );

		bbp_spam_reply( $r[0] );
		bbp_unapprove_reply( $r[2] );

		// Category reply count.
		$count = bbp_get_forum_reply_count( $c, false, true );
		$this->assertSame( 0, $count );

		// Category total reply count.
		$count = bbp_get_forum_reply_count( $c, true, true );
		$this->assertSame( 2, $count );

		// Forum reply count.
		$count = bbp_get_forum_reply_count( $f, false, true );
		$this->assertSame( 2, $count );

		// Forum total reply count.
		$count = bbp_get_forum_reply_count( $f, true, true );
		$this->assertSame( 2, $count );

		// Delete the _bbp_total_reply_count meta key.
		$this->assertTrue( delete_post_meta_by_key( '_bbp_total_reply_count' ) );

		// Delete the _bbp_reply_count meta key.
		$this->assertTrue( delete_post_meta_by_key( '_bbp_reply_count' ) );

		// Category reply count.
		$count = bbp_get_forum_reply_count( $c, false, true );
		$this->assertSame( 0, $count );

		// Category total reply count.
		$count = bbp_get_forum_reply_count( $c, true, true );
		$this->assertSame( 0, $count );

		// Forum reply count.
		$count = bbp_get_forum_reply_count( $f, false, true );
		$this->assertSame( 0, $count );

		// Forum total reply count.
		$count = bbp_get_forum_reply_count( $f, true, true );
		$this->assertSame( 0, $count );

		// Repair the forum reply count meta.
		bbp_admin_repair_forum_reply_count();

		// Category reply count.
		$count = bbp_get_forum_reply_count( $c, false, true );
		$this->assertSame( 0, $count );

		// Category total reply count.
		$count = bbp_get_forum_reply_count( $c, true, true );
		$this->assertSame( 2, $count );

		// Forum reply count.
		$count = bbp_get_forum_reply_count( $f, false, true );
		$this->assertSame( 2, $count );

		// Forum total reply count.
		$count = bbp_get_forum_reply_count( $f, true, true );
		$this->assertSame( 2, $count );
	}

	/**
	 * @covers ::bbp_admin_repair_user_topic_count
	 * @todo   Implement test_bbp_admin_repair_user_topic_count().
	 */
	public function test_bbp_admin_repair_user_topic_count() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_admin_repair_user_reply_count
	 * @todo   Implement test_bbp_admin_repair_user_reply_count().
	 */
	public function test_bbp_admin_repair_user_reply_count() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_admin_repair_user_favorites
	 * @todo   Implement test_bbp_admin_repair_user_favorites().
	 */
	public function test_bbp_admin_repair_user_favorites() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_admin_repair_user_topic_subscriptions
	 * @todo   Implement test_bbp_admin_repair_user_topic_subscriptions().
	 */
	public function test_bbp_admin_repair_user_topic_subscriptions() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_admin_repair_user_forum_subscriptions
	 * @todo   Implement test_bbp_admin_repair_user_forum_subscriptions().
	 */
	public function test_bbp_admin_repair_user_forum_subscriptions() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_admin_repair_user_roles
	 * @todo   Implement test_bbp_admin_repair_user_roles().
	 */
	public function test_bbp_admin_repair_user_roles() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_admin_repair_freshness
	 * @todo   Implement test_bbp_admin_repair_freshness().
	 */
	public function test_bbp_admin_repair_freshness() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_admin_repair_sticky
	 * @todo   Implement test_bbp_admin_repair_sticky().
	 */
	public function test_bbp_admin_repair_sticky() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_admin_repair_closed_topics
	 * @todo   Implement test_bbp_admin_repair_closed_topics().
	 */
	public function test_bbp_admin_repair_closed_topics() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_admin_repair_forum_visibility
	 * @todo   Implement test_bbp_admin_repair_forum_visibility().
	 */
	public function test_bbp_admin_repair_forum_visibility() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_admin_repair_forum_meta
	 */
	public function test_bbp_admin_repair_forum_meta() {

		$f = $this->factory->forum->create();

		$t = $this->factory->topic->create( array(
			'post_parent' => $f,
			'topic_meta' => array(
				'forum_id' => $f,
			),
		) );

		$r = $this->factory->reply->create( array(
			'post_parent' => $t,
			'reply_meta' => array(
				'forum_id' => $f,
				'topic_id' => $t,
			),
		) );

		// Forums should have an empty _bbp_forum_id meta key
		$this->assertEquals( array( 0 => '0' ), get_post_meta( $f, '_bbp_forum_id', false ) );

		// Topics should have a _bbp_forum_id meta key
		$this->assertSame( $f, bbp_get_topic_forum_id( $t ) );

		// Replies should have a _bbp_forum_id meta key
		$this->assertSame( $f, bbp_get_reply_forum_id( $r ) );

		// Delete the topic and reply _bbp_forum_id meta key
		$this->assertTrue( delete_post_meta_by_key( '_bbp_forum_id' ) );

		// Check the _bbp_forum_id meta key is deleted
		$this->assertEquals( array(), get_post_meta( $f, '_bbp_forum_id', false ) );
		$this->assertEquals( array(), get_post_meta( $t, '_bbp_forum_id', false ) );
		$this->assertEquals( array(), get_post_meta( $r, '_bbp_forum_id', false ) );

		// Repair the forum meta
		bbp_admin_repair_forum_meta();

		clean_post_cache( $f );
		clean_post_cache( $t );
		clean_post_cache( $r );

		// Forums should NOT have a _bbp_forum_id meta key
		$this->assertEquals( array(), get_post_meta( $f, '_bbp_forum_id', false ) );

		// Topics should have a _bbp_forum_id meta key
		$this->assertEquals( array( $f ), get_post_meta( $t, '_bbp_forum_id', false ) );
		$this->assertSame( $f, bbp_get_topic_forum_id( $t ) );

		// Replies should have a _bbp_forum_id meta key
		$this->assertEquals( array( $f ), get_post_meta( $r, '_bbp_forum_id', false ) );
		$this->assertSame( $f, bbp_get_reply_forum_id( $r ) );
	}

	/**
	 * @covers ::bbp_admin_repair_topic_meta
	 * @todo   Implement test_bbp_admin_repair_topic_meta().
	 */
	public function test_bbp_admin_repair_topic_meta() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_admin_repair_reply_menu_order
	 * @todo   Implement test_bbp_admin_repair_reply_menu_order().
	 */
	public function test_bbp_admin_repair_reply_menu_order() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_admin_upgrade_user_favorites
	 */
	public function test_bbp_admin_upgrade_user_favorites() {

		$u = $this->factory->user->create_many( 2 );
		$t = $this->factory->topic->create();

		// Create 2.5.x user meta favorites
		update_user_option( $u[0], '_bbp_favorites', $t );
		update_user_option( $u[1], '_bbp_favorites', $t );

		// Upgrade the user favorites.
		bbp_admin_upgrade_user_favorites();

		$expected            = array( $u[0], $u[1] );
		$favoriters          = bbp_get_topic_favoriters( $t );
		$post_meta_favorites = get_post_meta( $t, '_bbp_favorite', false );

		$this->assertEqualSets( $expected, $favoriters );
		$this->assertEqualSets( $expected, $post_meta_favorites );
	}

	/**
	 * @covers ::bbp_admin_upgrade_user_topic_subscriptions
	 */
	public function test_bbp_admin_upgrade_user_topic_subscriptions() {

		$u = $this->factory->user->create_many( 2 );

		$f = $this->factory->forum->create();

		$t = $this->factory->topic->create( array(
			'post_parent' => $f,
			'topic_meta' => array(
				'forum_id' => $f,
			),
		) );

		// Create 2.5.x user meta topic subscriptions.
		update_user_option( $u[0], '_bbp_subscriptions', $t );
		update_user_option( $u[1], '_bbp_subscriptions', $t );

		// Upgrade the user topic subscriptions.
		bbp_admin_upgrade_user_topic_subscriptions();

		$expected            = array( $u[0], $u[1] );
		$topic_subscribers   = bbp_get_topic_subscribers( $t );
		$post_meta_topic_sub = get_post_meta( $t, '_bbp_subscription', false );

		$this->assertEqualSets( $expected, $topic_subscribers );
		$this->assertEqualSets( $expected, $post_meta_topic_sub );
	}

	/**
	 * @covers ::bbp_admin_upgrade_user_forum_subscriptions
	 */
	public function test_bbp_admin_upgrade_user_forum_subscriptions() {

		$u = $this->factory->user->create_many( 2 );

		$f = $this->factory->forum->create();

		// Create 2.5.x user meta forum subscriptions.
		update_user_option( $u[0], '_bbp_forum_subscriptions', $f );
		update_user_option( $u[1], '_bbp_forum_subscriptions', $f );

		// Upgrade the user forum subscriptions.
		bbp_admin_upgrade_user_forum_subscriptions();

		$expected            = array( $u[0], $u[1] );
		$forum_subscribers   = bbp_get_forum_subscribers( $f );
		$post_meta_forum_sub = get_post_meta( $f, '_bbp_subscription', false );

		$this->assertEqualSets( $expected, $forum_subscribers );
		$this->assertEqualSets( $expected, $post_meta_forum_sub );
	}

	/**
	 * @covers ::bbp_admin_reset
	 * @todo   Implement test_bbp_admin_reset().
	 */
	public function test_bbp_admin_reset() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ::bbp_admin_reset_handler
	 * @todo   Implement test_bbp_admin_reset_handler().
	 */
	public function test_bbp_admin_reset_handler() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}
}
