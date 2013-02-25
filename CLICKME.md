=========================feature/41871879_subtheme_for_developer.konycloud.com==================
-go to structure->domain

Click on Edit developer.konycloud.com domain
Click on "ALIAS" tab on top right
Add new alias like "developer-konycloud.*.dev.kony.com"
save it -Go to Appereance and Enable the "Developer KonyCloud 1.0" Theme -Go back to Structure->Domain
Click on Edit developer.kony.com domain
Click on "Theme" tab on top right
Set Default theme as "Developer KonyCloud 1.0" save it & clear cache
web admin credentials username: admin password: admin123


===========================feature/42352621_kony_cloud_docs_view===============================

1. Enable the module "Views Grouping Row Limit" 
2. Enable the feature for the "Kony Cloud Docs" view

5. Please Clear cache.  

=====================feature/42541573_Recent_Developer_Tutorials_List================
Enable below feature for tutorial list for developer.konycloud.com
1. Add two fields under Software product taxonomy named field_kony_product_image and field_kony_product_icon
2. Enable Developer Tutorials View
=======================================================================

=======================feature/42716109_Convert_Developer_Home_Page_from_static_to_Dynamic======================
Enable the below listed features under features -> views
1. Enable Documentation List view 
2. Enable Recent Blog posts view 
3. Recreated the Software products view
4. Add a field under software product taxonomy named field_kony_product_front_icon
5. Place the blocks in appropriate regions in developer.konycloud theme
6. Enable Get Started List View
======================feature/42716143_headers_content_type_and_theming====================
1. Enable the content type feature "Headers" 
2. Make sure that "Kony Cloud Docs" view version will "7.x-1.1".
3. Go to "Blocks" and select the "Cloud Docs Content" region under "Developer Kony Cloud 1.0"
4. Add the content for "Headers" content type
5. Add the Content for "Software Download" Content type
6. Dependencies for "Software Download" Content Type "Downloadable File", "Software Documentation".
========================feature/42866883_Corrected_separate_header_menu_for_Developer_KonyCloud=======================================
1. Please create HEADER MENU as same a " www footer menu " items and pushed to HEADER region to DEVELOPER KONYCLOUD1.0 Theme
==============================feature/42867133_Domain_based_slides_theming_of_Developer_Konycloud===================
1. Please enable the view feature "Kony Cloud Slider"
2. Enable the module "domain views" 
3. Create dummy content (As of now) to get effect
===============feature/42353051_software_product_taxonomy_imagpath_fix===================================
1. Set the Region for "Kony Cloud Docs View" block for the "Cloud Docs" page.
=============================feature/42866779_Create_a_New_Content_Type_called_Product_Details===========
please enable the content type feature called "Product details"
===============================43051059_Add_Video_Launch_for_the_Latest_Tutorial_Image_in_Dev_Front_Page===================
1. Recreated feature "kony feature developer tutorials view"
2. if it is in overridden state, click on overridden link and click on revert components.

================================feature/43051385_Issues_of_Homepage_Slider_Developer_Konycloud===============
1. Enable the "BOX:Full-Size Slideshow" content type in structure->feature->content type
2. Create content for "BOX:Full-Size Slideshow", Title should be "Developer Home Page Slide" so then it automatically creates the 
   alias path  "content/developer-home-page-slide"
3. Please disable the "Cloud Slider" view through features								

============================feature/43292091_All_Content_Types_Image_File_should_use_StorageClass====================
Recreated features for the following content types
1. Developer Tutorial.
2. Downloadable File.
3. Gated Landing page.
4. for Gated landing page it will show "Needs Review", click on it and select fileds checkbox and click on "Mark as Reviewd".
5. After that it will shows in "Overridden" state, click on it and select fields checkbox and click on "Revert Components".

============================feature/43461695_Tutorial_Front_Page_Theming====================
1. Initially Create a Tutorial Front content for the Content Type Headers. It will Create the page with the URL alias mentioned (Ex : Created a content called tutorials-front)
2. Display the "View: Software Products" Block view in "Views Content Region"
3. Configure the "View: Software Products" Block to display in only the listed pages (Ex : tutorials-front)
==========================feature/43464191_software_download_content_type_changes====================================
Recreated feature for the following content type

1. Software Download 

==========================feature/43464135_cloud_docs_theme_issue_fixes===================================================
1. Create Content for the "Headers" Content type

2.Create the content for "Software Download" content type

	Dependent Content types are "Download Files"  and "Software Documentation" 

3. Go to "Blocks" Under "Developer Konycloud 1.0" set the region "View Content Region" for the  block "View: Kony Cloud Docs".

4. Click "configure" and Select "Only Listed Pages" radio button. 

5. Give the path of the "Header" content type url above created in the textbox.

6. Check "Header" content type  url above created.
==============================feature/43412643_Developer_tutorial_contentType_Changes==================================
please enable the following features
1.Developer Tutorial content type feature
2.Author content type feature
the configuration Steps after Enabling Syntax Highlighter Module

1.Under configuration Tab click on content authoring then click on syntaxhighlighter -path (/admin/config/content/syntaxhighlighter) and then select the languages you want to support and then save the configuration 
2. Under Configuration Tab click on content authoring then click on textformats -path (admin/config/content/formats) , add new text format naming (Syntax Highlighter)
3. While adding new content for developer tutorial select the newly created textformat in order to get syntax highlighter
============================feature/43461705_Getting_Started_Page_Theming_with_Design_Issues_Fixes==============
To enable new "getting started" Content type 
1. Goto Structure->features
 	- You can able to see TWO Features with the name "Getting started"
	   1. One with the Description "Content Type"
	   2. One with the Description "Enables the Getting Started Content Type" 	
        - Please disable the "Getting Started" with description  "Enables the Getting Started Content Type"
	- Please clear cache
	- Please delete the Content type "Getting Started" which has machine name "kony-getting-started"
	  by running the URL
	  EX: http://developer-konycloud.working.kjabu.dev.kony.com/admin/structure/types/manage/kony-getting-started/delete
 	- clear cache and check whether its deleted or not by going to "structure->content types"	
	- Then, Go to Structure->features
		- Enable the new feature with the name "Getting Started"[machinename: kony_cloud_getting_started], Description "Content Type"
	- Please save and clear cache

So by doing the above steps we can delete old one and get new one enabled
============================feature/43545265_Headers_Content_Type_Changes====================
1. Recreated the Headers Content Type Feature for the Updates 
2. If you get  "Needs Review" or "Overridden" Please markit as reviewd and revert components
=========================38047881_enable_save_and_edit_module=========================
1) Enable the save and Edit module
2) Adjust settings at admin/settings/save-edit
3) Select Node Types 
===============================feature/43464163_Software_Documentation_Content_Type_Changes======================
1. Recreated feature for "Software Documentation content type"
2. Go to Features -> Content types, for Software Documentation it will show "Needs Review", click on it and select fileds checkbox and click on "Mark as Reviewd".
3. After that it will shows in "Overridden" state, click on it and select fields checkbox and click on "Revert Components". 
4. Now the feature is in "Default" state.

=============================feature/43464163_file_directory_changes_in_content_types==============
Recreated features for the following content types
1. Author.
2. Downloadable File.
3. Gated Landing page.
4. if the feature state is "Needs Review", click on it and select fileds checkbox and click on "Mark as Reviewd".
5. After that if it will shows "Overridden" state, click on it and select fields checkbox and click on "Revert Components".

=====================feature/43501401_app_preview_video_for_tutorials==================
1. There are few fields need to delete manually since the feature can not delete automatically, from "Developer Tutorial Content type" due to naming conventions problem.
2. Go to Structure -> Content types -> Developer Tutorial content type -> manage fields
3. please delete field with machine name as "field_kony_level".
4. please delete field with machine name as "field_kony_developer_tags".
5. please delete field with machine name as "field_kony_software_product_type".
6. Click on save and then clear cache.
7. To restrict Syntax Highlighter module to inner pages, need to add configuration.
8. Click on Configuration -> content authoring -> syntax highlighter
	- in that "js/css code inject settings" section 
	a. select "Inject on all pages except those listed " option
	b. add "<front>" in that box
	c. add "tutorials/*" in that box
===============================feature/43545495_Feature_Issues=========================
1. Removed the unnecessary features from code
  - Latest Tutorials List [kony_feature_latest_tutorials_list]
  - Getting Started [kony_feature_getting_started]
  - Recent Tutorial list [kony_feature_recent_developer_tutorials] 
=====================feature/43740717_check_all_pages_fix_any_issues
Recreated the Feature for following View
  1.Developer Tutorials View
  2.if it is in overridden state, click on overridden link and click on revert components.

===================feature/43824173_Tutorial_Front_Issues_05_Feb===========================
1) Delete a Content Named "Tutorials" under "Basic Page" Content Type
2) Create / Update  Alias name of  "Tutorials" Content Under "Headers" Content Type as "tutorials"
2) Display "View: Developer Tutorials: Tutorials Front" Block View under "Views Content Region"
3) Configure "View: Developer Tutorials: Tutorials Front" View to be get displayed only under "tutorials" page
4) Re-enable the "Developer Tutorial" Content Type and "Develoeper tutorials View"
5) Display "View: Developer Tutorials: Popular Tutorials" Block Under "Home Page Recent Tutorials" Region
6) Configure "View: Developer Tutorials: Popular Tutorials" view to be get displayed only under "tutorials" page
7) Donot display the "View: Software Products" Block view under any region

=======================feature/43840919_dev_front_software_products_issues_05_Feb=======================================
1) Create a field with the name "field_kony_product_url" under "Software Products" Taxonomy
2) Display "View: Software Products" Block View under "Developer Front Software Products" region
3) Configure the "View: Software Products"block to display in all page where ever this region got rendered
===========================feature/43824305_Getting_Started_Page_Issues_Fixes=========================
1. Recreated feature for "Getting Started" content type.
2. if it is in "Needs Review state" click on "Mark as Reviewed"
3. if it is in "Overridden state" click on "Revert Components"


===========================feature/43910049_docs_page_changes=================================

1)Recreated the Kony Cloud Docs View--
    if it is in "Needs Review state" click on "Mark as Reviewed"
    if it is in "Overridden state" click on "Revert Components"

2)In Software Product Taxonomy delete the existing terms and add the terms and corresponding data in following order.

Order should be as below
  1)Kony Studio
  2)Kony Server
  3)Kony Cloud
  4)Kony Sync
  5)MAM


3) If any software download content is available please re-assaign the product.
=================================feature/43824173_Tutorial_Front_Issues_05_Feb=================================================
1. Enable Statistics Module from admin panel
2. Enable Count Content Views Checkbox under CONTENT VIEWING COUNTER SETTINGS Section in admin/config/system/statistics page
3. Re-enable Developer Ttorial View Feature
=========================== feature/43911047_Product_Details_Page_Changes_Issues_Fixes=========================
1. Recreated feature for "Product Details" content type.
2. if it is in "Needs Review state" click on "Mark as Reviewed"
3. if it is in "Overridden state" click on "Revert Components"
4. Delete the Product Name field_kony_prod_det_prod_name manually.
===========================================feature/43910455_API_Documentation_Section_Changes===================
1. Recreated feature for "Documentation List View"
 - if it is in "Needs Review state" click on "Mark as Reviewed"
 - if it is in "Overridden state" click on "Revert Components"
==================================feature/43996041_Tutorial_Listing_Page_changes===============================
Recreated the Feature for following View
  1.Developer Tutorials View
  2.if it is in overridden state, click on overridden link and click on revert components.
=========================feature/44176347_Add_international_numbers_to_phone_numbers============
1. We Should add the countries in "Country" Taxonamy
2. Edit the "Locations" nodes to ensure its pointed to country properly(using the term reference field)
3. Check the "Locations List View"(v7.x-1.2) in feature 
	- if it is "Overridden" state, Please revert components
	-if it is "Needs Review" state, Please "mark as reviewd"
4. Push the "View: Locations List View: Locations Tel No List" block to the "Header location navigation" region for KONY.2.0 Theme
================================feature/44177375_Tutorial_list_View_Changes===============================
Recreated the Feature for Following View
  1.Developer Tutorial View
  2.If it is in overridden state , click on overridden link and click on rever components.

==================================feature/44177217_Developer_Tutorials_Article_Page_Issues=================================
1. Login as Admin

2. Go to configuration

3. Click on wysiwyg profiles. It lists all the "Input Formats"

4. Click on "Edit" beside "Filtered HTML"

5. Click on "Buttons And Plugins" link.

6. Enable "Image" Button and save.

7. Do the same for "Full HTML" Input Format also.

8. Now go the content in "Edit" mode.

9. The Image button can able to see after"Insert/Edit link" under "Description" field for any "Developer Tutorial" content type.

==================================== feature/44176727_Cloud_docs_page_Changes =============================================
1. Recreated the Kony Cloud Docs View
    if it is in "Needs Review state" click on "Mark as Reviewed"
    if it is in "Overridden state" click on "Revert Components"
