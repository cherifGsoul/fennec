<?php
/**
 *
 */
class Fennec_Post_Type extends Fennec_Object
{
	protected $name;
	protected $plural;
	protected $singular;
	protected $hierarchical = false,
	protected $description = '';
	protected $taxonomies= array();
	protected $public= true;
	protected $show_ui= true;
	protected $show_in_menu= true;
	protected $show_in_admin_bar= true;
	protected $menu_position= null;
	protected $menu_icon= null;
	protected $show_in_nav_menus= true;
	protected $publicly_queryable= true;
	protected $exclude_from_search= false;
	protected $has_archive= true;
	protected $query_var= true;
	protected $can_export= true;
	protected $rewrite= true;
	protected $capability_type= 'post';
	protected $supports= array(
		'title', 'editor', 'author', 'thumbnail',
		'excerpt', 'custom-fields', 'trackbacks', 'comments',
		'revisions', 'page-attributes', 'post-formats'
   );

  protected $text_domain;

    public function __construct( $name, $plural, $singular, $args ) {
        $this->$plural=$plural;
        $this->$singular=$singular;
        $this->name=$name;
        foreach ( $args as $key => $value ) {
            $this->$key=$value;
        }
        $this->register_type( $this->name, $this->plural, $this->singular );
    }

    protected function process_args( $plural, $singlar ) {
        $labels = array(
            'name'                => __( $this->plural, self::$_text_domain ),
            'singular_name'       => __( $this->singular, self::$_text_domain ),
            'add_new'             => _x( 'Add New ' . $this->singular, self::$_text_domain ),
            'add_new_item'        => __( 'Add New ' . $this->singular, self::$_text_domain ),
            'edit_item'           => __( 'Edit ' . $this->singular, self::$_text_domain ),
            'new_item'            => __( 'New ' . $this->singular, self::$_text_domain ),
            'view_item'           => __( 'View ' . $this->singular, self::$_text_domain ),
            'search_items'        => __( 'Search ' . $this->plural, self::$_text_domain ),
            'not_found'           => __( 'No ' . $this->plural . ' found', self::$_text_domain ),
            'not_found_in_trash'  => __( 'No ' . $this->plural . ' found in Trash', self::$_text_domain ),
            'parent_item_colon'   => __( 'Parent ' . $this->singular .':', self::$_text_domain ),
            'menu_name'           => __( $this->plural . ' Name', self::$_text_domain ),
        );

        $args = array(
            'labels'              => $labels,
            'hierarchical'        => $this->hierarchical
            'description'         => $this->description
            'taxonomies'          => $this->taxonomies
            'public'              => $this->public
            'show_ui'             => $this->show_ui
            'show_in_menu'        => $this->show_in_menu
            'show_in_admin_bar'   => $this->show_in_admin_bar
            'menu_position'       => $this->menu_position
            'menu_icon'           => $this->menu_icon
            'show_in_nav_menus'   => $this->show_in_nav_menus
            'publicly_queryable'  => $this->publicly_queryable
            'exclude_from_search' => $this->exclude_from_search
            'has_archive'         => $this->has_archive
            'query_var'           => $this->query_var
            'can_export'          => $this->can_export
            'rewrite'             => $this->rewrite
            'capability_type'     => $this->capability_type
            'supports'            => $this->supports
        );
        return $args;
    }

    /**
     *
     *
     * @return
     */
    public function register_type( $name, $plural, $singular ) {
        $args= $this->process_args( $plural, $singular );
        register_post_type( $name, $args );
    }

    /**
     * Gets the value of name.
     *
     * @return mixed
     */
    public function get_name() {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param mixed   $name the name
     *
     * @return self
     */
    public function set_name( $name ) {
        $this->name = $name;
    }

    /**
     * Gets the value of plural.
     *
     * @return mixed
     */
    public function get_plural() {
        return $this->plural;
    }

    /**
     * Sets the value of plural.
     *
     * @param mixed   $plural the plural
     *
     * @return self
     */
    public function set_plural( $plural ) {
        $this->plural = $plural;
    }

    /**
     * Gets the value of singular.
     *
     * @return mixed
     */
    public function get_singular() {
        return $this->singular;
    }

    /**
     * Sets the value of singular.
     *
     * @param mixed   $singular the singular
     *
     * @return self
     */
    public function set_singular( $singular ) {
        $this->singular = $singular;
    }

    /**
     * Gets the value of hierarchical.
     *
     * @return mixed
     */
    public function get_hierarchical() {
        return $this->hierarchical;
    }

    /**
     * Sets the value of hierarchical.
     *
     * @param mixed   $hierarchical the hierarchical
     *
     * @return self
     */
    public function set_hierarchical( $hierarchical ) {
        $this->hierarchical = $hierarchical;
    }



    /**
     * Gets the value of description.
     *
     * @return mixed
     */
    public function get_description() {
        return $this->description;
    }



    /**
     * Sets the value of description.
     *
     * @param mixed   $description the description
     *
     * @return self
     */
    public function set_description( $description ) {
        $this->description = $description;
    }


    /**
     * Gets the value of taxonomies.
     *
     * @return mixed
     */
    public function get_taxonomies() {
        return $this->taxonomies;
    }

    /**
     * Sets the value of taxonomies.
     *
     * @param mixed   $taxonomies the taxonomies
     *
     * @return self
     */
    public function set_taxonomies( $taxonomies ) {
        $this->taxonomies = $taxonomies;
    }

    /**
     * Gets the value of public.
     *
     * @return mixed
     */
    public function get_public() {
        return $this->public;
    }

    /**
     * Sets the value of public.
     *
     * @param mixed   $public the public
     *
     * @return self
     */
    public function set_public( $public ) {
        $this->public = $public;
    }

    /**
     * Gets the value of show_ui.
     *
     * @return mixed
     */
    public function get_show_ui() {
        return $this->show_ui;
    }

    /**
     * Sets the value of show_ui.
     *
     * @param mixed   $show_ui the show_ui
     *
     * @return self
     */
    public function set_show_ui( $show_ui ) {
        $this->show_ui = $show_ui;
    }

    /**
     * Gets the value of show_in_menu.
     *
     * @return mixed
     */
    public function get_show_in_menu() {
        return $this->show_in_menu;
    }

    /**
     * Sets the value of show_in_menu.
     *
     * @param mixed   $show_in_menu the show_in_menu
     *
     * @return self
     */
    public function set_show_in_menu( $show_in_menu ) {
        $this->show_in_menu = $show_in_menu;
    }

    /**
     * Gets the value of show_in_admin_bar.
     *
     * @return mixed
     */
    public function get_show_in_admin_bar() {
        return $this->show_in_admin_bar;
    }

    /**
     * Sets the value of show_in_admin_bar.
     *
     * @param mixed   $show_in_admin_bar the show_in_admin_bar
     *
     * @return self
     */
    public function set_show_in_admin_bar( $show_in_admin_bar ) {
        $this->show_in_admin_bar = $show_in_admin_bar;
    }

    /**
     * Gets the value of menu_position.
     *
     * @return mixed
     */
    public function get_menu_position() {
        return $this->menu_position;
    }

    /**
     * Sets the value of menu_position.
     *
     * @param mixed   $menu_position the menu_position
     *
     * @return self
     */
    public function set_menu_position( $menu_position ) {
        $this->menu_position = $menu_position;
    }

    /**
     * Gets the value of menu_icon.
     *
     * @return mixed
     */
    public function get_menu_icon() {
        return $this->menu_icon;
    }

    /**
     * Sets the value of menu_icon.
     *
     * @param mixed   $menu_icon the menu_icon
     *
     * @return self
     */
    public function set_menu_icon( $menu_icon ) {
        $this->menu_icon = $menu_icon;
    }

    /**
     * Gets the value of show_in_nav_menus.
     *
     * @return mixed
     */
    public function get_show_in_nav_menus() {
        return $this->show_in_nav_menus;
    }

    /**
     * Sets the value of show_in_nav_menus.
     *
     * @param mixed   $show_in_nav_menus the show_in_nav_menus
     *
     * @return self
     */
    public function set_show_in_nav_menus( $show_in_nav_menus ) {
        $this->show_in_nav_menus = $show_in_nav_menus;
    }

    /**
     * Gets the value of publicly_queryable.
     *
     * @return mixed
     */
    public function get_publicly_queryable() {
        return $this->publicly_queryable;
    }

    /**
     * Sets the value of publicly_queryable.
     *
     * @param mixed   $publicly_queryable the publicly_queryable
     *
     * @return self
     */
    public function set_publicly_queryable( $publicly_queryable ) {
        $this->publicly_queryable = $publicly_queryable;
    }

    /**
     * Gets the value of exclude_from_search.
     *
     * @return mixed
     */
    public function get_exclude_from_search() {
        return $this->exclude_from_search;
    }

    /**
     * Sets the value of exclude_from_search.
     *
     * @param mixed   $exclude_from_search the exclude_from_search
     *
     * @return self
     */
    public function set_exclude_from_search( $exclude_from_search ) {
        $this->exclude_from_search = $exclude_from_search;
    }

    /**
     * Gets the value of has_archive.
     *
     * @return mixed
     */
    public function get_has_archive() {
        return $this->has_archive;
    }

    /**
     * Sets the value of has_archive.
     *
     * @param mixed   $has_archive the has_archive
     *
     * @return self
     */
    public function set_has_archive( $has_archive ) {
        $this->has_archive = $has_archive;
    }

    /**
     * Gets the value of query_var.
     *
     * @return mixed
     */
    public function get_query_var() {
        return $this->query_var;
    }

    /**
     * Sets the value of query_var.
     *
     * @param mixed   $query_var the query_var
     *
     * @return self
     */
    public function set_query_var( $query_var ) {
        $this->query_var = $query_var;
    }

    /**
     * Gets the value of can_export.
     *
     * @return mixed
     */
    public function get_can_export() {
        return $this->can_export;
    }

    /**
     * Sets the value of can_export.
     *
     * @param mixed   $can_export the can_export
     *
     * @return self
     */
    public function set_can_export( $can_export ) {
        $this->can_export = $can_export;
    }

    /**
     * Gets the value of rewrite.
     *
     * @return mixed
     */
    public function get_rewrite() {
        return $this->rewrite;
    }

    /**
     * Sets the value of rewrite.
     *
     * @param mixed   $rewrite the rewrite
     *
     * @return self
     */
    public function set_rewrite( $rewrite ) {
        $this->rewrite = $rewrite;
    }

    /**
     * Gets the value of capability_type.
     *
     * @return mixed
     */
    public function get_capability_type() {
        return $this->capability_type;
    }

    /**
     * Sets the value of capability_type.
     *
     * @param mixed   $capability_type the capability_type
     *
     * @return self
     */
    public function set_capability_type( $capability_type ) {
        $this->capability_type = $capability_type;
    }

    /**
     * Gets the value of supports.
     *
     * @return mixed
     */
    public function get_supports() {
        return $this->supports;
    }

    /**
     * Sets the value of supports.
     *
     * @param mixed   $supports the supports
     *
     * @return self
     */
    public function set_supports( $supports ) {
        $this->supports = $supports;
    }
}
