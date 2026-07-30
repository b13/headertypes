![CI](https://github.com/b13/headertypes/actions/workflows/ci.yml/badge.svg)

# EXT:headertypes - Separate the semantic header type from the header layout

## Features

- Adds a dedicated **Header Type** field to content elements to control the semantic HTML tag (`<h1>`–`<h6>`) of a header
- Adds a matching **Subheader Type** field for the subheader
- Decouples the *semantics* of a heading from its *visual appearance*
- Renames the TYPO3 Core "Header Layout" field to the clearer label **Layout** so editors understand it only affects styling
- Ships as a lightweight, backend-only extension: it adds the fields, your site package renders them
- Supports TYPO3 v12.4, v13 and v14 from a single extension version

## Why did we create this extension?

TYPO3 Core ships a single `header_layout` field for content headers. That one field is used for two very
different things at once: it decides both *how a header looks* and *which HTML tag* is rendered (`<h1>` … `<h6>`).

In real projects those two concerns pull apart:

- A header that should look like a large "H2" for design reasons might still need to be an `<h1>` for a correct
  document outline.
- Accessibility and SEO depend on a clean, hierarchical heading structure that editors should not be forced to
  break just to achieve a certain look.
- Designers want freedom over typography without side effects on the semantic structure of the page.

EXT:headertypes solves this by splitting the concern in two:

- **Layout** (the existing `header_layout` field, relabeled) keeps controlling the *visual* appearance.
- **Header Type** / **Subheader Type** (the new fields) control the *semantic* HTML tag.

This lets editors pick, for example, "looks like a Layout 2 heading, but is semantically an `<h1>`" — cleanly and
without templating hacks.

## Installation

Install this extension via `composer req b13/headertypes` or download it from the
[TYPO3 Extension Repository](https://extensions.typo3.org/extension/headertypes/) and activate the extension in the
Extension Manager of your TYPO3 installation.

## How it works

The extension adds two select fields to the `tt_content` table:

| Field                          | Purpose                       | Values                                                                 |
|--------------------------------|-------------------------------|------------------------------------------------------------------------|
| `tx_headertypes_headertype`    | Semantic tag of the header    | `0` = Default, `1`–`6` = `h1`–`h6`, `7` = `p`, `8` = `span`            |
| `tx_headertypes_subheadertype` | Semantic tag of the subheader | `0` = Default, `1`–`6` = `h1`–`h6`, `7` = `p`, `8` = `span`            |

Both fields are added to the Core `header` and `headers` palettes, so they appear directly next to the header input
in the backend for every content element that uses those palettes. The value `0` ("Default") means "do not override" —
your template should fall back to its normal header rendering in that case.

The extension does **not** render anything in the frontend on its own. Rendering the chosen tag is the job of your
site package or theme, which keeps the extension unopinionated and compatible across TYPO3 versions.

## Frontend rendering

To make the new fields take effect, override the header partial in your site package (for
`fluid_styled_content` this is `Resources/Private/Partials/Header/Header.html`) and use
`tx_headertypes_headertype` to choose the tag, while keeping `header_layout` for the visual class.

```html
<f:comment>EXT:my_sitepackage/Resources/Private/Partials/Header/Header.html</f:comment>
<f:if condition="{data.header}">
    <f:switch expression="{data.tx_headertypes_headertype}">
        <f:case value="1"><h1 class="header-layout-{data.header_layout}">{data.header}</h1></f:case>
        <f:case value="2"><h2 class="header-layout-{data.header_layout}">{data.header}</h2></f:case>
        <f:case value="3"><h3 class="header-layout-{data.header_layout}">{data.header}</h3></f:case>
        <f:case value="4"><h4 class="header-layout-{data.header_layout}">{data.header}</h4></f:case>
        <f:case value="5"><h5 class="header-layout-{data.header_layout}">{data.header}</h5></f:case>
        <f:case value="6"><h6 class="header-layout-{data.header_layout}">{data.header}</h6></f:case>
        <f:case value="7"><p class="header-layout-{data.header_layout}">{data.header}</p></f:case>
        <f:case value="8"><span class="header-layout-{data.header_layout}">{data.header}</span></f:case>
        <f:defaultCase>
            <f:comment>Header Type "Default" (0): fall back to your regular header_layout based rendering.</f:comment>
        </f:defaultCase>
    </f:switch>
</f:if>
```

The same principle applies to the subheader via `{data.tx_headertypes_subheadertype}`.

## Compatibility

| Extension version | TYPO3 versions              |
|-------------------|-----------------------------|
| 1.x               | v12.4, v13, v14             |

## Credits

This extension was created by David Steeb in 2020 for [b13 GmbH, Stuttgart](https://b13.com).

[Find more TYPO3 extensions we have developed](https://b13.com/useful-typo3-extensions-from-b13-to-you) that help us
deliver value in client projects. As part of the way we work, we focus on testing and best practices to ensure
long-term performance, reliability, and results in all our code.
