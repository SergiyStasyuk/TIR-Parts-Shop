<?php


$this->title = 'Запчастини для вантажних автомобілів в інтернет-магазині TIRMarket';

use app\models\QuickOrder;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;
use app\controllers\BrandController;

?>
<main class="page-main">
    <div class="page-size">
        <div class="_flex _justify-between _items-center _mb-3">
            <div class="title">Каталог товарів</div>
            <a href="<?= yii\helpers\Url::to(['product-category/index']) ?>">Усі категорії →</a></div>
        <div class="_flex _grid-space-3 _mb-4">
            <div class="_col-12 _sm-col-6 _lg-col-3 _mb-3">
                <div class="category-card">
                    <a href="/product-category/5" class="category-card__image">
                        <img src="/images/catalog_tree/small/ee2b30148f13481b5e7e6db36e7a8856.gif" alt="">
                    </a>
                    <div class="category-card__title">ГАЛЬМІВНА СИСТЕМА</div>
                    <a href="/product-category/5"
                       class="category-card__link">Перейти до розділу →</a>
                </div>
            </div>
            <div class="_col-12 _sm-col-6 _lg-col-3 _mb-3">
                <div class="category-card">
                    <a href="/product-category/7" class="category-card__image">
                        <img src="/images/catalog_tree/small/9c3edfbe82a0738da1e37e181d7c7380.jpg" alt="">
                    </a>
                    <div class="category-card__title">ДВИГУН</div>
                    <a href="/product-category/7"
                       class="category-card__link">Перейти до розділу →</a>
                </div>
            </div>
            <div class="_col-12 _sm-col-6 _lg-col-3 _mb-3">
                <div class="category-card">
                    <a href="/product-category/10" class="category-card__image">
                        <img src="/images/catalog_tree/small/4ef524eebae5ff492b936f2dc66f1c1c.jpg" alt="">
                    </a>
                    <div class="category-card__title">ШИНА ВАНТАЖНА</div>
                    <a href="product-category/10"
                       class="category-card__link">Перейти до розділу →</a>
                </div>
            </div>
            <div class="_col-12 _sm-col-6 _lg-col-3 _mb-3">
                <div class="category-card">
                    <a href="/product-category/13" class="category-card__image">
                        <img src="/images/catalog_tree/small/4945990f062eb13fcbcf73e45adb0c78.jpg" alt="">
                    </a>
                    <div class="category-card__title">ПІДВІСКА</div>
                    <a href="/product-category/13"
                       class="category-card__link">Перейти до розділу →</a>
                </div>
            </div>
        </div>
    </div>


    <div class="fast-order-section _pt-5 _pb-5">
        <div class="page-size">
            <div class="_flex _justify-center">
                <div class="_col-12 _md-col-8 _lg-col-6 _xl-col-5">
                    <div class="title title--white _text-center">Підібрати деталь / автозапчастину</div>
                    <div class="subtitle subtitle--white _text-center _mb-4">Ми зателефонуємо протягом 5 хвилин та
                        підберемо запчастину
                    </div>
                    <?php $form = ActiveForm::begin(); ?>
                    <span class="form-element _mb-3">
                        <?= $form->field($model, 'part_name')->textInput(['maxlength' => true], ['class' => 'form-element__input form-element__input--round'])->input('', ['placeholder' => 'Найменування деталі або артикул'])->label(''); ?>
                    </span>
                    <span class="form-element _mb-3">
                            <?= $form->field($model, 'name')->textInput(['maxlength' => true], ['class' => 'form-element__input form-element__input--round'])->input('', ['placeholder' => 'Ваше ім\'я'])->label(''); ?>
                    </span>
                    <span class="form-element _mb-3">
                            <?= $form->field($model, 'phone')->textInput(['maxlength' => true], ['class' => 'form-element__input form-element__input--round'])->input('tel', ['placeholder' => 'Контактний телефон'])->label(''); ?>
                    </span>
                    <div class="_flex">
                        <?= Html::submitButton('Підібрати', ['class' => 'button _m-auto _pl-5 _pr-5']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>


                </div>
            </div>
        </div>
    </div>
    <div style="background-color: #f8f8f8" class="_pt-4 _pb-2">
        <div class="page-size">
            <div class="_flex _justify-between _items-center _mb-3">
                <div class="title">Виробники</div>
                <a href="<?= Url::to(['/brand/index']) ?>">Усі виробники →</a></div>
            <div class="producer _mb-5">
                <?= ListView::widget([
                    'dataProvider' => $dataProviderBrand,
                    'itemView' => '/brand/_item',
                    'layout' => "\n{items}",
                    'options' => [
                        'tag' => 'div',
                    ],
                    'itemOptions' => [
                        'tag' => 'div',
                        'class' => 'producer__item'
                    ],
                ]); ?>
            </div>
        </div>
    </div>
    <div class="page-size _pt-4 _pb-4">
        <div class="_flex _justify-between _items-center _mb-3">
            <div class="title">Наші партнери</div>
            <a href="<?= Url::to(['site/partners']) ?>">Усі партнери →</a>
        </div>
        <div class="wysiwyg">
            <p>
            <p>Заручившись підтримкою наших партнерів, ми можемо підняти вас на новий рівень безпеки і комфорту руху.
                Кожне наше ексклюзивна пропозиція залишає клієнтів у виграші. Завдяки унікальним партнерським взаєминам
                Тірмаркет завжди знаходиться в курсі новітніх досягнень і готовий запропонувати клієнтам краще з
                доступного.</p></p>
        </div>
        <div class="_flex _grid-2 _sm-grid-3 _lg-grid-6 _items-center _mb-3 _mt-3">
        </div>
    </div>
    <div style="background-color: #f8f8f8" class="_pt-4 _pb-4">
        <div class="page-size">
            <div class="_flex _justify-between _items-center _mb-3">
                <div class="title">Новини та статті</div>
                <a href="<?= Url::to(['/news']) ?>">Усі новини →</a></div>

            <div class="_flex _grid-space-3">
                <?= ListView::widget([
                    'dataProvider' => $dataProviderNews,
                    'itemView' => '/news/_item',
                    'layout' => "\n{items}",
                    'options' => [
                        'tag' => 'div',
                        'class' => '_flex _grid-space-3'
                    ],
                    'itemOptions' => [
                        'tag' => 'div',
                        'class' => '_col-12 _xl-col-6'
                    ],
                ]); ?>
            </div>
        </div>
    </div>
    <div class="seo-section">
        <div class="page-size">
            <h1 class="title _mb-3">Величезний вибір деталей для вантажівок</h1>
            <div class="_flex _grid-1 _md-grid-2 _grid-space-4">
                <div class="wysiwyg _mb-4"><p>Сьогодні в Україні експлуатується багато вантажних автомобілів
                        європейських марок. Вони надійні та продуктивні, але немає такої машини, на якій би нічого не
                        ламалося. Деталі, виконуючи свої функції, зношуються &mdash; одні швидше, інші повільніше. Але в
                        сучасних реаліях це не проблема. Запчастини для вантажівок замінні, і співпрацюючи з
                        інтернет-магазином TIR Market, ви в цьому переконаєтеся. У нас реально купити будь-яку деталь
                        для
                        європейської техніки:</p>
                    <ul>
                        <li>DAF;</li>
                        <li>Renault Truck;</li>
                        <li>Mercedes;</li>
                        <li>Volvo;</li>
                        <li>Scania;</li>
                        <li>MAN;</li>
                        <li>Iveco та інших.</li>
                    </ul>
                    <p>Окрім запчастин для вантажних авто, ведеться продаж комплектуючих та запчастин на причепи і
                        напівпричепи, а також для автобусів відомих європейських торгових марок. На всі товари дається
                        гарантія.</p>
                    <h2>Великий вибір, швидкий пошук</h2>
                    <p>Купуйте запасні частини до всіх вузлів вантажних автомобілів, причепів, напівпричепів, а також
                        автобусів:</p>
                    <ul>
                        <li>гальмівна та випускна системи;</li>
                        <li>електродвигун;</li>
                        <li>гідравліка;</li>
                        <li>підвіска;</li>
                        <li>ходова;</li>
                        <li>зчеплення;</li>
                        <li>освітлення;</li>
                        <li>електрообладнання;</li>
                        <li>рульове керування;</li>
                        <li>охолодження;</li>
                        <li>кузов тощо.</li>
                    </ul>
                    <p>В інтернет-магазині запропоновані не тільки запчастини для вантажівок, але і аксесуари, що
                        створюють комфорт у машині і підвищують її експлуатаційні характеристики.</p>
                    <p>Електронний каталог відрізняється зрозумілим користувацьким інтерфейсом, який дозволяє протягом
                        короткого часу вивчити асортимент. До того ж питання пошуку запчастин для вантажівок можна
                        передоручити нашим співробітникам: заповніть спеціальну форму, і вони виконають роботу за лічені
                        хвилини.</p></div>
                <div class="wysiwyg _mb-4"><h2>Укомплектуємо будь-який вузол</h2>
                    <p>Запчастини на вантажівки постачаємо від таких виробників:</p>
                    <ul>
                        <li>KNORR;</li>
                        <li>BOSCH;</li>
                        <li>SAMPA;</li>
                        <li>FAG;</li>
                        <li>SAF;</li>
                        <li>MONROE та інших.</li>
                    </ul>
                    <p>Поставляються вони на склади Tirmarket, які розміщені у Ковелі, Луцьку, Житомирі і два в Києві
                        &mdash; на правому та лівому березі міста. Наш асортимент сформований таким чином, щоб можна
                        було замінити зношену деталь окремо, а не вузол в цілому. Наприклад, в групі запчастин для
                        двигунів вантажівок представлені такі позиції:</p>
                    <ul>
                        <li>поршні та кільця;</li>
                        <li>елементи ГРМ;</li>
                        <li>колінвал;</li>
                        <li>прокладки;</li>
                        <li>ремені;</li>
                        <li>турбіна та інше.</li>
                    </ul>
                    <p>Для гальмівної системи вантажівок пропонуються вали, барабани, ресивери, пневматичні крани; для
                        підвіски &mdash; втулки, амортизатори, ресори, подушки, стабілізатори. У групі аксесуарів
                        представлені магнітоли, зарядні пристрої, домкрати, пристосування для кріплення вантажів,
                        ковпаки, двірники тощо. У нас завжди є велика кількість стандартних запчастин на вантажівки,
                        перш за все гайок різних типів та розмірів.</p>
                    <p>Представлено в широкому асортименті інструмент для ремонту авто. Це штангенциркулі, пасатижі,
                        рулетки, шпателі, електроди, магніти. Серед виробників такої продукції: Airpress, Belgium. Для
                        зручності обслуговування вантажних авто пропонується купити спеціальні ключі для викрутки.</p>
                    <h2>Якісний сервіс</h2>
                    <p>В окреме меню виділені новинки для комплектування вантажівок. Вони регулярно з'являються в
                        каталозі. Тому щоб бути в курсі надходжень, не забувайте заходити на сайт. У нас багато
                        пропозицій від компаній, зайнятих експлуатацією, обслуговуванням вантажівок та тих, хто
                        практикує роздрібну торгівлю запчастинами. Товар можна купити оптовими і дрібними партіями.</p>
                    <p>Доставка запчастин здійснюється кур'єрською службою та за підтримки логістичних операторів. Її
                        термін &mdash; від 24 до 72 годин після затвердження заявки. Ми автоматично страхуємо запчастини
                        вантажівок перед відправленням. Це необхідно на випадок непередбачених ситуацій в дорозі.
                        Важливий момент: якщо ви відмовляєтеся від послуги страхування, то компанія знімає з себе
                        відповідальність за цілісність посилки &mdash; вона повністю лягає на вас.</p></div>
            </div>
        </div>
    </div>
</main>
