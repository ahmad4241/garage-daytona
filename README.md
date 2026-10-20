# Garage Daytona

Custom front end for **Garage Daytona**, a car garage in Geneva, Switzerland. The site runs on WordPress, and these must-use plugins render the pages visitors see, in French.

**Live site:** https://garagedaytona.ch

## What's here

| Folder | What it does |
| --- | --- |
| `mu-plugins/` | The page code as it runs on the live site: header, footer, animated hero, home page, and the service pages (mechanics, bodywork, cleaning, technical inspection, used car sales, about, contact) plus a QR landing page |
| `assistant/` | Readable source of the **Daytona Assistant** shown on the home page |
| `tyres/` | The tyres page: front end of the tyre search and booking (product photos not included) |

## Daytona Assistant

A smart assistant built for this site, with no outside AI service:

- Understands questions in French, English and German from keywords, and tolerates small typos
- Answers from the garage's own information: services, prices and opening hours
- For a car problem, asks one follow-up question and sets the urgency
- Hands the customer over to the garage's WhatsApp with a ready-made message

## Built with

PHP (WordPress must-use plugins), HTML, CSS and plain JavaScript, with GSAP for the hero animation. Designed and built by [Ahmad Alhallak](https://ahmadalhallak.com) for a client, with AI assistance (Claude).

The garage's control panel and the server maintenance tools are kept private and are not part of this repository.
