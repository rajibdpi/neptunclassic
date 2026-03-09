NEPTUNCLASSIC THEME FOR OMEKA CLASSIC
=====================================

What is included
----------------
- NEPTUN-inspired visual style
- Modern card grid for items and collections
- Modern homepage search box
- Search page shell
- IIIF-ready item viewer area
- Fallback image gallery when no manifest is present

How IIIF works in this theme
----------------------------
The item page checks these fields for a manifest URL:
1. Dublin Core > Identifier
2. Dublin Core > Relation
3. Item Type Metadata > Text (optional fallback)

If a manifest URL is found, the page embeds Universal Viewer from:
https://universalviewer.io/uv/uv.html

If no manifest URL is found, the page shows Omeka's normal item image gallery.

Recommended plugins
-------------------
- Simple Pages
- Exhibit Builder
- Universal Viewer (Classic)
- IIIF Toolkit

Installation
------------
1. Upload the folder 'neptunclassic' into your Omeka Classic /themes directory.
2. In Omeka admin, go to Appearance > Themes.
3. Activate 'Neptun Classic'.
4. Open theme configuration and set logo, accent color, hero title, and hero text.

Optional workflow for local IIIF
--------------------------------
If you use a IIIF plugin or external image server, paste the manifest URL into
Dublin Core > Identifier or Relation for each item.

Notes
-----
This theme is NEPTUN-inspired for Omeka Classic. It is not a copy of the live
NEPTUN site, which uses a custom Omeka S implementation.
