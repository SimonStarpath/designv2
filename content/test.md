---
title: "Test-sida"
views:
    flash:
        region: flash
        template: anax/v2/image/default

    left-info:
        region: sidebar-left
        template: anax/v2/block/default
        data:
            meta:
                type: single
                route: block/test-left

    right-info:
        region: sidebar-right
        template: anax/v2/block/default
        data:
            meta:
                type: single
                route: block/test-right
---
Mittsektion
===========

Sidan visar hur text ser ut när det stylas med Markdown
***

# H1
## H2
### H3
#### H4
##### H5
###### H6
**bold text**


*italicized text*
> blockquote

1. First item
2. Second item
3. Third item

- First item
- Second item
- Third item

`code`

| Syntax | Description |
| ----------- | ----------- |
| Header | Title |
| Paragraph | Text |

```
{
  "firstName": "John",
  "lastName": "Smith",
  "age": 25
}
```

Here's a sentence with a footnote. [^1]

[^1]: This is the footnote.

term
: definition

- [x] Write the press release
- [ ] Update the website
- [ ] Contact the media
