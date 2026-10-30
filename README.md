# Amega Zavod — корпоративный сайт на 1C-Bitrix

![Bitrix](https://img.shields.io/badge/1C--Bitrix-CMS-blue)
![PHP](https://img.shields.io/badge/PHP-Legacy%20Project-777bb4)
![CRM](https://img.shields.io/badge/CRM-Bitrix24-00a3ff)
![Forms](https://img.shields.io/badge/Forms-PHPMailer%20%2B%20Lead%20Flow-success)
![Frontend](https://img.shields.io/badge/Frontend-jQuery%20%2B%20Swiper%20%2B%20Bootstrap-informational)
![Repo](https://img.shields.io/badge/Repo-GitFlic-black)
![Status](https://img.shields.io/badge/Status-Active%20Redesign-orange)


> Корпоративный сайт завода светопрозрачных конструкций (ПВХ/алюминий) **«Амега»** на **1C-Bitrix**. Проект находится в активном редизайне: старый шаблон (`amegazavod`) постепенно заменяется новым (`amegazavod_new`), страницы переезжают блок за блоком.
>
> Как и большинство боевых Bitrix-проектов, репозиторий — это **не полный дамп сайта**, а кодовая/шаблонная часть, которая осмысленно хранится в git. Ядро `bitrix/`, медиатека, бэкапы и секреты — вне репозитория.

---

## Оглавление

- [Что это за проект](#что-это-за-проект)
- [Стек](#стек)
- [Локальная сборка](#локальная-сборка)
- [Что лежит в GitFlic](#что-лежит-в-gitflic)
- [Структура репозитория](#структура-репозитория)
   - [`windows/` — детально](#windows--детально-самый-крупный-раздел)
- [Глоссарий Bitrix-терминов](#глоссарий-bitrix-терминов)
- [1. `local/` — детальный разбор](#1-local--детальный-разбор)
- [2. `local/php_interface/`](#2-localphp_interface)
- [3. `local/templates/` — шаблоны сайта](#3-localtemplates--шаблоны-сайта)
- [4. `parts/` и `include/`](#4-parts-и-include--переиспользуемые-блоки)
- [Формы и лидогенерация](#формы-и-лидогенерация)
- [Архитектура компонента `amega:form`](#архитектура-компонента-amegaform)
- [SEO и геозависимость](#seo-и-геозависимость)
- [Как добавить новую страницу](#как-добавить-новую-страницу-чеклист)
- [Что важно не коммитить](#что-важно-не-коммитить)
- [Для разработчиков](#для-разработчиков)
- [Git-flow и коммиты](#git-flow-и-коммиты)
- [Статус проекта](#статус-проекта)

---

## Что это за проект

Сайт `amegazavod.ru` совмещает:

- десятки продуктовых и SEO-разделов (окна, двери, балконы, алюминий и т.д.), каждый — файловый лендинг в отдельной папке корня;
- кастомные Bitrix-компоненты в `local/components/amega/` (формы, конфигуратор окон, баннеры, витрины);
- переопределённые шаблоны стандартных компонентов Bitrix (`bitrix:news`, `bitrix:news.list`, `bitrix:news.detail` и др.) под конкретные разделы;
- переиспользуемые PHP-блоки в `parts/` и `include/` (формы, карты, галереи, баннеры);
- централизованный обработчик форм `form.php` с интеграцией в Bitrix24 CRM и почтовой рассылкой через PHPMailer;
- геозависимую логику (определение города, региональная маршрутизация заявок).

По своей природе это не «чистое приложение» и не «один аккуратный backend», а **боевой Bitrix‑сайт, который развивался вокруг продовой структуры**: через шаблоны, страницы в папках, include‑фрагменты, кастомные блоки и централизованный обработчик форм.

---

## Стек

| Слой | Технологии |
|---|---|
| CMS / backend | 1C-Bitrix, PHP |
| Frontend | HTML, CSS/SCSS, JavaScript, jQuery (2.1.3 legacy + 3.7.0) |
| UI-библиотеки | Bootstrap, Swiper.js, Inputmask, jQuery Validate, html2pdf |
| Сборка | Gulp |
| Почта | PHPMailer |
| CRM | Bitrix24 (REST / webhook через `crm/crest.php`) |
| Карты | Яндекс.Карты (JS API) |
| Локальная среда | OpenServer (`amega-backup.local`), PhpStorm |
| Деплой | FileZilla → TimeWeb VDS, Git-операции через PuTTY на сервере |

---

## Локальная сборка

Полная рабочая копия проекта обычно собирается из нескольких частей:

1. **Клонируется этот репозиторий** — код, шаблоны, компоненты, продуктовые разделы.
2. **Разворачивается бэкап боевого сайта** на локальный OpenServer (`amega-backup.local`).
3. Поверх бэкапа **подмешивается код из репозитория**.
4. Отдельно подключаются директории и файлы, исключённые из git (`.gitignore`):
    - `/bitrix` — ядро Bitrix;
    - `/upload` — медиатека Bitrix;
    - `/local/templates/amegazavod` — **старый шаблон сайта** (ещё используется на части страниц, из git исключён сознательно);
    - `/local/php_interface/form_config.php` — секреты и SMTP-данные для `form.php`;
    - `/local/rate_limit/` — служебные JSON-файлы rate limiting по IP;
    - изображения (`*.png/jpg/jpeg/webp/svg/avif`) — **кроме** `local/templates/amegazavod_new/img/**`, которые сознательно закоммичены;
    - документы, архивы, видео и прочие тяжёлые бинарники.

Поэтому репозиторий **не является self-contained** - без ядра Bitrix, бэкапа БД и `form_config.php` сайт не запустится «из коробки».

---

## Что лежит в GitFlic

Репозиторий хранит в основном то, что реально поддерживается разработкой:

- пользовательские PHP‑страницы и разделы сайта;
- шаблоны, компоненты и проектную логику в `local/`;
- переиспользуемые блоки в `parts/` и `include/`;
- формы, ajax‑обработчики и CRM‑сценарии;
- SEO‑служебные файлы (`robots.txt.php`, `sitemap.xml.php`, `urlrewrite.php`);
- библиотеку `PHPMailer` и смежные каталоги;
- изображения и часть статических ресурсов, которые нужны в репозитории.

---

## Структура репозитория

```text
.
├── PHPMailer/                       # библиотека отправки почты (используется в form.php)
├── ajax/                            # ajax-обработчики
│   └── review_form.php              # обработчик формы оценки страницы, отвечает JSON
├── crm/                             # интеграция с Bitrix24 CRM
│   ├── crest.php                    # REST-клиент Bitrix24 (webhook)
│   ├── settings.php                 # webhook URL, флаги логирования
│   ├── install.php
│   └── checkserver.php
├── email/                           # ассеты email-подписи и Stripo-шаблона рассылки
│   └── 27/                          # SVG для конкретной подписи (лого, футер, шапка филиала)
├── include/                         # мелкие php-инклюды
│   ├── inputmask/                   # библиотека jquery.inputmask.js
│   ├── copyright.php
│   ├── motto.php
│   ├── news.php
│   ├── random.php
│   └── company_name.php
├── local/                           # ключевая проектная директория Bitrix — см. раздел ниже
│   ├── components/amega/            # кастомные компоненты (empty, form, configurator, numbers, projects, serial)
│   ├── php_interface/               # хендлеры/хуки Bitrix + form_config.php (вне git)
│   └── templates/
│       ├── amegazavod_new/          # активный шаблон редизайна
│       └── amegazavod/              # старый шаблон — вне git, только в бэкапе
├── parts/                           # переиспользуемые PHP-блоки без статуса компонента — см. раздел ниже
├── assets/images/framer/            # ресурсы для раздела framer
├── img/, imgs/                      # изображения корня и «новые» пути изображений
│
├── windows/                         # раздел «Окна» — самый крупный, 101 файл — см. таблицу ниже
├── aluminum/                        # Алюминий: dveri-cold/, dveri-warm/, fasadnoye-ostekleniye-cold/, fasadnoye-ostekleniye-warm/, peregorodki/
├── balconies/                       # Балконы: aluminum/ (холодное остекление), pvh/ (ПВХ остекление)
├── dveri/                           # Двери: balcony/, metal/, vhodnie/ (ПВХ)
├── materials/                       # Материалы: protective_film/, pvh/, pvh_ruchki/, steklo/
├── terrace-doors/                   # Террасные двери
├── portalnye-sistemy-otkryvaniya/   # Портальные системы открывания (панорамные, верандные, межкомнатные, балконные)
├── portaly-maco-skb-z/              # Портальные системы MACO/SKB-Z
├── okna-iz-profilya-klassa-a/       # Окна из профиля класса А (SEO-лендинг)
├── skrytye-petli/                   # Скрытые петли
├── vkleivanie-steklopaketov/        # Вклеивание стеклопакетов
├── window_mylock/                   # Продукт «Умный замок» для окон
├── potolki/                         # Натяжные потолки
├── zap/                             # Портальные системы (доп. посадочная)
├── moskitnyye-setki/                # Москитные сетки (июнь 2026, построена с нуля)
│
├── about/                           # О компании
├── office/                          # Контакты (офисы, склады, карта — построена с нуля, май–июнь 2026)
├── career/                          # Карьера
├── vakansii/                        # Вакансии (список/детальная, использует новостную инфраструктуру)
├── feedback/                        # Отзывы
├── news/                            # Новости
├── news-smi/                        # СМИ о нас
├── novinki/                         # Новинки
├── stati/                           # Полезные статьи
├── projects/                        # Проекты (реализованные объекты)
├── partners/                        # Партнёры
├── dlya-dilerov/                    # Для дилеров (+ new-dealers/, src/)
├── sertificates/                    # Сертификаты (aluminum/, furnitura/, glass/, metal-dveri/, pvh/)
├── sertificates_door/               # Сертификаты дверей
├── sertificates_okna/               # Сертификаты стекла/окон
├── bonus/                           # Бонусная/промо-программа (cash3/cash4)
├── sales/                           # Акции
├── deadlines/                       # Сроки/лимиты (+ excel.php, lami.php, src/)
├── order/                           # «Ваше окно» — раздел заказа
├── shourum-kovorking/               # Шоурум-коворкинг (отдельная контентная страница)
├── privacy/                         # Политика обработки персональных данных
├── search/                          # Поиск по сайту
├── home/                            # Инклюды главной страницы (main_slider.php, products.php, video.php)
├── framer/, framer_old/             # Маркетинговый раздел (текущий и устаревший)
├── test/                            # Тестовый раздел
├── thanks/                          # Thank-you страница
│
├── .access.php, .section.php        # права доступа и section-настройки Bitrix (в корне и в каждом разделе)
├── 404.php
├── form.php                         # центральный обработчик всех форм сайта
├── index.php / index_old.php        # текущая и предыдущая главная
├── questions.php, questions/        # страница и раздел FAQ
├── robots.txt.php                   # генерация robots.txt (с учётом Last-Modified/Etag и города)
├── sitemap.xml.php                  # генерация sitemap.xml
└── urlrewrite.php                   # ЧПУ-роутинг Bitrix (news, news-smi, feedback, projects, ...)
```

### `windows/` — детально (самый крупный раздел)

| Подраздел | Что это                                                                                                           |
|---|-------------------------------------------------------------------------------------------------------------------|
| `window-lineup/` | Линейка окон — точка входа `Главная → Линейка окон`                                                               |
| `window-lineup/profiles/` | Профильные системы (Эконом/Комфорт/Премиум) — с табами-фильтрами и сравнением                                     |
| `okna-s-laminatsiyey/` | Окна с ламинацией — блок **`lam-colors`** (таблица 42 цвета × до 10 профилей, sticky-заголовок, фильтры, тултипы) |
| `energy/` | Окна Energy (модели 1-4, характеристики, сопутствующие товары)                                                    |
| `cold-aluminum/` / `warm-aluminum/` | Окна из алюминия — холодный / тёплый контур                                                                       |
| `okna-pexay/` | Окна РЕХАУ                                                                                                        |
| `nestandartnyh-form/` | Нестандартные окна (нестандартные формы)                                                                          |

---

## Глоссарий Bitrix-терминов

Для тех, кто впервые заходит в проект без опыта в 1С-Битрикс:

| Термин | Что значит |
|---|---|
| **Инфоблок** (infoblock) | Основная единица хранения структурированных данных в Bitrix — аналог «таблицы» с настраиваемыми полями (свойствами). Дилеры, офисы, сертификаты и т.д. хранятся как элементы инфоблоков. |
| **Компонент** (component) | Переиспользуемый программный блок Bitrix со своим PHP-классом (`class.php`) и одним или несколькими шаблонами вывода. Аналог виджета/модуля. |
| **Шаблон компонента** (component template) | Конкретное визуальное представление компонента — `template.php` + `style.css`/`script.js` внутри `components/.../<component>/templates/<template_name>/`. У одного компонента может быть несколько шаблонов. |
| **`.section.php`** | Файл настроек раздела (папки) — имя раздела, свойства, наследуемые параметры. Есть почти в каждой директории контента. |
| **`.access.php`** | Файл прав доступа на папку/раздел (кто может читать/писать). |
| **ЧПУ** | Человекопонятный URL — «красивые» ссылки вида `/windows/energy/` вместо `?id=123`; настраиваются в `urlrewrite.php`. |
| **Публичная часть / админка** | Публичная часть — то, что видят посетители сайта; админка — служебная панель управления Bitrix (`/bitrix/admin/`). |
| **`CMain`/`$APPLICATION`** | Глобальный объект ядра Bitrix, через который подключаются шаблоны, заголовки, meta-теги и т.д. |

---

## 1. `local/` — детальный разбор

### `local/components/amega/` — кастомные компоненты

| Компонент | Класс | Назначение | Шаблоны |
|---|---|---|---|
| `amega:empty` | `CAmegaEmptyComponent` | универсальный пустой контейнер для подключения разных шаблонов на страницах | `dealer_advantages`, `index_banner`, `index_products` |
| `amega:form` | `CAmegaFormComponent` | формы обратной связи, все шаблоны отправляют данные в `/form.php` с reCAPTCHA; поле `region` обязательно — используется для роутинга писем менеджерам | `.default` (форма «Стать дилером»), `modal`, `modal_dealer`, `page_review` (рейтинг + шеринг в MAX/VK/Telegram) |
| `amega:configurator` | `CAmegaConfiguratorComponent` | **интерактивный конфигуратор окон**, ранее жил в `/parts/configurator/`, теперь оформлен как полноценный Bitrix-компонент | `windows` (`template.php`, `script.js`, `style.css`) |
| `amega:numbers` | `CAmegaNumbersComponent` | числовые показатели завода, с кешированием (`startResultCache()`) | `.default` |
| `amega:projects` | `CAmegaProjectsComponent` | блок проектов, с кешированием | `.default` |
| `amega:serial` | `CAmegaSerialComponent` | витрина серийных товаров, поддерживает пагинацию через `START_INDEX` | `.default` |

> JS-классы форм объявлены прямо в `script.js` соответствующего шаблона `amega:form` (`window.<Класс> = class {...}`), отдельного общего файла для них нет:
> - `AmegaFormDefault` — `templates/.default/script.js`
> - `AmegaForm` — `templates/modal/script.js`
> - `AmegaFormDealer` — `templates/modal_dealer/script.js`

---

## 2. `local/php_interface/`

`includes/handlers/handlers.prop.php` — кастомный тип пользовательского свойства инфоблока `listElementWithDescription`. Расширяет стандартную привязку к элементам инфоблока (`PROPERTY_TYPE = "E"`), добавляя поле «Количество» к каждой привязке (используется, например, для комплектующих). Методы: `GetIBlockPropertyDescription()`, `GetPropertyFieldHtml()`, `ConvertToDB()`, `ConvertFromDB()`.

`form_config.php` (в этой же папке) — **не хранится в git**, содержит SMTP — креды и прочие секреты, подключается в `form.php`.

---

## 3. `local/templates/` — шаблоны сайта

Два шаблона сайта — старый и новый дизайн.

### `amegazavod` — старый шаблон
*Исключён из git (`.gitignore: /local/templates/amegazavod`), существует только в полной локальной сборке / бэкапе. Часть страниц сайта всё ещё работает на нём, пока не переехали на редизайн.*

**Основные файлы:**
- `header.php`, `footer.php`, `menu.php`, `head.php` — шапка, подвал, меню, мета
- `city.php` — логика определения города пользователя
- `css/main.css`, `css/style-media.css` — основные стили + медиазапросы
- `js/script.js`, `js/function.js` — основная логика + вспомогательные функции
- `js/calc.js` — калькулятор
- `styles.css`, `template_styles.css` — стили шаблона

**Шрифты:** FontAwesome + Glyphicons (Bootstrap)

**JS-библиотеки:** jQuery 2.1.3 + 3.7.0, Bootstrap, Swiper, Inputmask, jQuery Validate, html2pdf

<details>
<summary><b>Компоненты Bitrix (переопределённые шаблоны) — раскрыть список</b></summary>

- `bitrix:news` — несколько видов: `news_company`, `news_company_main`, `news_otrasl`, `partners`, `product`, `product_detail`, `sertificates`
- `bitrix:news.detail` — шаблоны детальных страниц: `feedback`, `material`, `new`, `news-smi`, `projects`, `stati`
- `bitrix:news.list` — шаблоны списков: `feeds_clients`, `main_slider_new`, `materials`, `news`
- `bitrix:catalog.section/materials` — каталог материалов

</details>

---

### `amegazavod_new` — новый шаблон (редизайн, активный)

Расширенная версия старого шаблона с новым дизайном. Наследует всю базу (`header.php`, `footer.php`, `menu.php`, `head.php`, `city.php`, шрифты, JS-библиотеки, старые Bitrix-компоненты) и добавляет поверх неё слой редизайна.

**Дополнительно по сравнению со старым:**
- `css/new/style.css` — новые стили редизайна
- `css/primary.css` — базовые UI-компоненты (кнопки, поля, чекбоксы)
- `css/pages/` — постраничные стили: `index.css`, `protective.film.css`, `pvh.petli.css`
- `js/pages/` — постраничные скрипты
- `js/utils/video.js` — утилиты для видео
- Изображения для баннеров и форм: `img/banner/`, `img/pages/`, `img/forms/`

<details>
<summary><b>Новые SVG-иконки — раскрыть список</b></summary>

`logo-amega`, `burger-close`, `marker`, `search`, `tg-new`, `vk-new`, `vk-group`, `dzen`, `catalog`, `chevron` и др. (+ версии `-white` для тёмного фона)

</details>

<details>
<summary><b>Новые компоненты, только в <code>_new</code> — раскрыть список</b></summary>

- `bitrix:news/feedback` — список/детальная для отзывов
- `bitrix:news.list/feedback` — список отзывов
- `bitrix:news.list/news.redesign` — новостной список в новом дизайне
- `bitrix:news.list/reviews` — блок отзывов
- `bitrix:search.page/.default` — страница поиска
- `bitrix:search.suggest.input/main` — саджест поиска

</details>

---

## 4. `parts/` и `include/` — переиспользуемые блоки

`parts/` — блоки без статуса Bitrix-компонента, подключаются `include`-ом на страницах:

<details open>
<summary><b>Состав <code>parts/</code></b></summary>

- `forms/` — формы: `career.php`, `dealer.php`/`dealer_new.php`, `feedback.php`, `payment_request.php`/`_new.php`, `practice.php` + соответствующие `.js`;
- `map/` — карта офисов/складов (`map.php`, `map.js`, `map.css`);
- `banners/`, `framer/` — маркетинговые баннеры;
- `gallery-slider/`, `related_products/`, `complementary-items/` — витринные блоки со своими `script.js`/`style.css`;
- `feedback/`, `modals/`, `preview/`, `spinner/`, `statistics/`, `heat_norm_block/` — точечные UI-блоки;
- `breadcrumbs.php`, `pagination.php`/`pagination2.php`, `documents.php`, `delivery.php`, `technical.php` — служебные include-фрагменты.

</details>

`include/` — совсем мелкие php-инклюды: `company_name.php`, `copyright.php`, `motto.php`, `news.php`, `random.php`, плюс библиотека `inputmask/`.

---

## Формы и лидогенерация

Типовой pipeline заявки:

```text
Форма (parts/forms/*.php ИЛИ local/components/amega/form)
   ↓  JS (AmegaFormDefault / AmegaForm / AmegaFormDealer) + AJAX/POST
   ↓
/form.php
   ↓  h() — экранирование, strip_tags() для CRM-полей,
   ↓  attachFileIfValid() / getValidUploadedFile() — валидация вложений,
   ↓  reCAPTCHA с проверкой hostname, rate limiting по IP (/local/rate_limit/)
   ↓
PHPMailer → email-уведомление менеджеру (маршрутизация по полю region)
   +
crm/crest.php → Bitrix24 CRM (lead.add)
```

Отдельно: `ajax/review_form.php` — обработчик формы оценки страницы (`page_review`), отвечает `Content-Type: application/json`, результат показывается тостом на странице (без редиректа на `/thanks`).

Ключевые контакты для маршрутизации лидов:
- **Смирнов Алексей** (менеджер по дилерам, Bitrix24 ID `5946`) — заявки с `/window-lineup/` и `/dlya-dilerov/`;
- **Степанова Наталья** (маркетинг) — универсальный получатель email-уведомлений.

---

## Архитектура компонента `amega:form`

Как один компонент обслуживает четыре разных сценария форм через разные шаблоны:

```text
amega:form (CAmegaFormComponent)
├── .default       — «Стать дилером»          → AmegaFormDefault      ─┐
├── modal          — якорная форма            → AmegaForm              ├─→ /form.php
├── modal_dealer   — модалка без «Компании»   → AmegaFormDealer       ─┘
└── page_review    — оценка страницы          → ajax/review_form.php
```

---

## SEO и геозависимость

- `robots.txt.php` — генерация с учётом `Last-Modified`/`Etag` и текущего города;
- `sitemap.xml.php` — статический список разделов с приоритетами;
- `urlrewrite.php` — ЧПУ для `news`, `news-smi`, `feedback`, `projects` и др.;
- `local/templates/amegazavod_new/city.php` — определение города пользователя, влияет на контент офисов/складов и часть форм.

---

## Как добавить новую страницу (чеклист)

1. Создать директорию раздела в корне (например `windows/new-section/`).
2. Добавить `.section.php` с `$sSectionName` и (при необходимости) `$arDirProperties`.
3. Добавить `.access.php`, если нужны нестандартные права.
4. Создать `index.php` — использовать существующую страницу с похожей структурой как референс (например `windows/okna-pexay/` для простого лендинга).
5. Завести подпапки `css/`, `js/` по конвенции проекта (не `styles/`, не `scripts/`).
6. Подключить ассеты через `Asset::getInstance()->addCss()` / `addJs()` — **не** через устаревший `$APPLICATION->AddHeadScript()`.
7. Если странице нужна форма — переиспользовать `local/components/amega/form` (не писать новый обработчик) или добавить блок в `parts/forms/`, если это не типовая форма.
8. Добавить пункт меню в `local/templates/amegazavod_new/menu.php`, если раздел должен появиться в навигации.
9. Проверить `urlrewrite.php` — не требуется ли отдельное ЧПУ-правило.
10. Добавить раздел в `sitemap.xml.php`.
11. Верстать блок за блоком: сначала HTML, затем CSS, затем JS — по принятой в проекте итеративной практике.

---

## Что важно не коммитить

- `local/php_interface/form_config.php` (SMTP, секреты);
- `local/rate_limit/` (служебные данные rate limiting);
- ядро `/bitrix`, `/upload`;
- `local/templates/amegazavod` (старый шаблон — сознательно вне git);
- любые webhook-URL и CRM-ключи вне `form_config.php`/`crm/settings.php`;
- тяжёлые медиа (кроме явных исключений для `amegazavod_new/img/**`).

---

## Для разработчиков

Перед изменениями важно понимать:

1. **Какой шаблон обслуживает страницу** — старый (`amegazavod`, вне git) или новый (`amegazavod_new`). При редизайне страница переезжает на новый.
2. **Откуда приходит блок** — кастомный Bitrix-компонент (`local/components/amega/*`), переопределённый стандартный компонент (`local/templates/amegazavod_new/components/bitrix/*`) или обычный include (`parts/`, `include/`).
3. **Как устроена подключение ассетов** — через `Asset::getInstance()->addCss()`/`addJs()`/`addString()`; `$APPLICATION->AddHeadScript()` считается устаревшим и не используется в новом коде.
4. **Не сломает ли изменение** форму (`form.php`), геологику (`city.php`), CRM-маппинг или SEO-маршруты (`urlrewrite.php`, `robots.txt.php`, `sitemap.xml.php`).

Особенно осторожно стоит работать с: `form.php`, `local/`, `parts/forms/`, `crm/`, `urlrewrite.php`.

Принятые в проекте паттерны:
- BEM-подобные имена классов с префиксом страницы/блока;
- CSS-переменные из глобальной дизайн-системы;
- медиазапросы только `max-width` (desktop-first, `min-width` не используется);
- итеративная разработка блок за блоком: сначала HTML → потом CSS → потом JS;
- предпочтение целостных блоков кода частичным сниппетам при ревью/доработке.

---

## Git-flow и коммиты

- Git-операции выполняются через PuTTY на сервере, версии кода синхронизируются с локальной разработкой.
- Рекомендуемый формат коммитов: `<область>: <что сделано>` (например `lam-colors: fix sticky header offset`, `form: add rate limiting`) — облегчает поиск по истории при разрастании команды.
- Перед пушем в боевую ветку — ручная проверка через FileZilla/тестовый сервер, автоматических CI-проверок в проекте нет.
- Для более формального процесса ревью и веток при расширении команды — вынести отдельным `CONTRIBUTING.md`.

---

## Статус проекта

Активно поддерживаемый **production-редизайн**: часть страниц уже на новом шаблоне (`amegazavod_new`), часть — ещё на старом.

---

## License / Internal note

Внутренний проект компании «Амега». README предназначен для команды разработки и онбординга новых разработчиков.
