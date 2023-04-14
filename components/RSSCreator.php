<?php
namespace app\components;

class RSSCreator
{
    public static function create()
    {
        $content = '<?xml version="1.0" encoding="UTF-8"?>
        <rss xmlns:yandex="http://news.yandex.ru"
             xmlns:media="http://search.yahoo.com/mrss/"
             xmlns:turbo="http://turbo.yandex.ru"
             version="2.0">
            <channel>
                <!-- Информация о сайте-источнике -->
                <title>КПК «ТРЕСТ»</title>
                <link>http://trest24.ru</link>
                <description>Кредитный потребительский кооператив «Трест»</description>
                <language>ru</language>';

        $content .= self::getInfoItem();
        $content .= self::getDocsItem();
        $content .= self::getRequisitesItem();
        $content .= self::getMskItem();
        $content .= self::getRskItem();
        $content .= self::getEstateItem();
        $content .= self::getConsumerItem();
        $content .= self::getDepositItem();
        $content .= self::getContactsItem();
        $content .= '</channel></rss>';

        $rss = $_SERVER['DOCUMENT_ROOT'] . '/rss.xml';

        if (is_writable($rss)) {
            $fp = fopen($rss, 'w+');

            if (!$fp) {
                return "Не могу открыть файл ($rss)";
            }

            // Записываем $somecontent в наш открытый файл.
            if (fwrite($fp, $content) === FALSE) {
                return "Не могу произвести запись в файл ($rss)";
            }

            fclose($fp);

            return "Ура! Записали в файл ($rss)";
        } else {
            return "Файл $rss недоступен для записи";
        }
    }

    public static function getPageHeader($title, $link, $h1)
    {
        return "<item turbo='true'>
                    <turbo:extendedHtml>true</turbo:extendedHtml>
                    <title>$title</title>
                    <link>$link</link>
                    <turbo:content>
                        <![CDATA[
                          <header>
                            <h1>
                                $h1
                            </h1>
                            <menu>
                                <a href='https://trest24.ru/about'>Информация о ТРЕСТ</a>
                                <a href='https://trest24.ru/doc'>Управляющие документы</a>
                                <a href='https://trest24.ru/requisites'>Реквизиты</a>
                                <a href='https://trest24.ru/news'>Новости</a>
                                <a href='https://trest24.ru/mission'>Наша миссия</a>
                                <a href='https://trest24.ru/zaym/materinskii-kapital'>Займ по программе «Материнский капитал»</a>
                                <a href='https://trest24.ru/zaym/semeynii-kapital'>Займ по программе «РСК»</a>
                                <a href='https://trest24.ru/zaym/pod-zalog-nedvizhimosti'>Займ под залог недвижимости</a>
                                <a href='https://trest24.ru/zaym/potreb-kredit'>Займ потребительский</a>
                                <a href='https://trest24.ru/deposit'>Сберегательные программы</a>
                                <a href='https://trest24.ru/contacts'>Главный офис</a>
                                <a href='https://trest24.ru/dir'>Обратиться к руководителю</a>
                                <a href='https://trest24.ru/reviews'>Отзывы</a>
                                <a href='https://trest24.ru/gallery'>Фотогалерея</a>
                            </menu>
                          </header>";//<a href='https://trest24.ru/zaym/450000'>Займ по программе «Господдержка 450 000 рублей»</a>
    }

    public static function getPageFooter()
    {
        return '<div class="footer">
                    <div data-block="widget-feedback" data-title="Связаться с нами" data-stick="right">
                    <div data-type="callback"
                         data-send-to="site@trest24.ru"
                         data-agreement-company="КПК «ТРЕСТ»"
                         data-agreement-link="https://tek-sber.ru/file/upload/%D0%9F%D0%BE%D0%BB%D1%8C%D0%B7%D0%BE%D0%B2%D0%B0%D1%82%D0%B5%D0%BB%D1%8C%D1%81%D0%BA%D0%BE%D0%B5%20%D1%81%D0%BE%D0%B3%D0%BB%D0%B0%D1%88%D0%B5%D0%BD%D0%B8%D0%B5.pdf"
                    >
                    </div>
                    <div data-type="mail" data-url="mailto:site@trest24.ru"></div>
                    <div data-type="vkontakte" data-url="https://vk.com/public212646335"></div>
                  </div>
                  <p class="text-center">
                    Москва, Красная Пресня 29
                  </p>
                  <p class="text-center footer-info">
                    Кредитный потребительский кооператив «ТРЕСТ» (КПК «ТРЕСТ») ОГРН: 1186820002 170 ИНН: 6829140628, 
					Член Ассоциации "Саморегулируемая организация "Национальное объединение кредитных кооперативов", о чем в реестр членов внесена запись за №6, от 29.09.2022. 
					Сберегательные и заемные программы КПК «ТРЕСТ» доступны только для пайщиков кооператива на основе солидарного 
					несения членами субсидиарной ответственности по его обязательствам в пределах не внесенной части дополнительного 
					взноса каждого из членов. Кооператив оказывает услуги исключительно пайщикам.
                  </p>
                  <p class="text-center">
                    ©2023 trest24.ru
                  </p>
                </div>';
    }

    public static function getInfoItem()
    {
        $item = self::getPageHeader('Информация о КПК ТРЕСТ', 'https://trest24.ru/about', 'Информация о ТРЕСТ');

        $item .= '<div class="info">
			<div class="info-block">
				<img src="https://trest24.ru/file/upload/8798d54ed0ec00b79716f7448cfad323.png" alt="about">
   			</div>
			<div class="info-block">
				<div class="info-item">
					<div class="info-item-image">
						<img src="https://trest24.ru/img/yellow-shield.webp" alt="shield">
					</div>
					<div>
						Кооператив осуществляет свою деятельность в соответствии с нормами Гражданского кодекса Российской Федерации, на основании Федерального закона «О кредитной кооперации» № 190-ФЗ от 18.07.2009г, нормативными актами Банка России, стандартами и правилами СРО, Уставом, положениями и внутренними нормативными документами.
					</div>
    			</div>
				<div class="info-item">
					<div class="info-item-image">
						<img src="https://trest24.ru/img/yellow-shield.webp" alt="shield">
					</div>
					<div>
						Кооператив состоит в Государственном реестре кредитных потребительских кооперативов Центрального банка Российской Федерации.
					</div>
    			</div>
				<div class="info-item">
					<div class="info-item-image">
						<img src="https://trest24.ru/img/yellow-shield.webp" alt="shield">
					</div>
					<div>
						Кооператив состоит в реестре Ассоциации "Саморегулируемая организация "Национальное объединение кредитных кооперативов", о чем внесена запись за №6, от 29.09.2022.
					</div>
    			</div>
				<div class="info-item">
					<div class="info-item-image">
						<img src="https://trest24.ru/img/yellow-shield.webp" alt="shield">
					</div>
					<div>
						Надзор и контроль за деятельностью кооператива осуществляют надзорные органы: Центральный банк РФ, СРО, РосФинМониторинг.
					</div>
    			</div>
    			<div class="info-item">
					<div class="info-item-image">
						<img src="https://trest24.ru/img/yellow-shield.webp" alt="shield">
					</div>
					<div>
						Кооператив соблюдает финансовые нормативы, установленные Центральным банком РФ, такие как: ограничения по срокам выдачи займов, доле капитала, которую можно вкладывать в государственные ценные бумаги, соотношению привлеченных средств и выданных займов и так далее, что позволяет соблюдать финансовую устойчивость в краткосрочной и долгосрочной перспективе.
					</div>
    			</div>
    			<div class="info-item">
					<div class="info-item-image">
						<img src="https://trest24.ru/img/yellow-shield.webp" alt="shield">
					</div>
					<div>
						В соответствии с Федеральным законом «О кредитной кооперации» № 190-ФЗ от 18.07.2009г Кооператив осуществляет формирование резервного фонда – своеобразная финансовая подушка безопасности. Эти деньги всегда остаются на расчетном счете организации. Средства резервного фонда могут использоваться только для обеспечения непредвиденных расходов и покрытия убытков кооператива.
					</div>
    			</div>
    			<div class="info-item">
					<div class="info-item-image">
						<img src="https://trest24.ru/img/yellow-shield.webp" alt="shield">
					</div>
					<div>
						Кооператив делает отчисления 0,2% от среднегодовых активов в Ассоциацию "Саморегулируемая организация "Национальное объединение кредитных кооперативов", из этих денег в СРО формируется компенсационный фонд, что является аналогом системе страхования банковских вкладов АСВ.
					</div>
    			</div>
    			<div class="info-item">
					<div class="info-item-image">
						<img src="https://trest24.ru/img/yellow-shield.webp" alt="shield">
					</div>
					<div>
						В соответствии с уставом Кооператив осуществляет работу следующим образом:
						<ol>
						    <li>
						        Кооператив формирует фонды — аналог уставного капитала. За счет собственных средств кооператива, паевых взносов, привлеченных сбережений.
                            </li>
						    <li>
						        Кооператив часть денежных средств из фондов выдает в виде займов, а часть вкладывает в государственные ценные бумаги.
                            </li>
                        </ol>
					</div>
    			</div>
   			</div>
			<div class="info-block">
    			<h2>Что нужно, чтобы стать пайщиком?</h2>
				<div class="info-item">
					<div class="info-item-number">1</div>
					<div>
      					<b>
							Подтвердить членство в Ассоциации потребителей Финансовых услуг «ФИНАНСЫ» (ОГРН 1223400004190, ИНН 3453007240, КПП 345301001)
						</b>
     				</div>
    			</div>
				<div class="info-item">
					<div class="info-item-number">2</div>
					<div>
      					<b>
							Написать заявление на вступление в Кооператив в офисе «ТРЕСТ»
						</b>
     				</div>
    			</div>
				<div class="info-item">
					<div class="info-item-number">3</div>
					<div>
      					<b>
							Оплатить вступительный и паевой взносы:
						</b>
	`					<div class="info-item-list">
							<ul>
                              <li class="info-item-list-item">Вступительный — <b>10 р.</b></li>
                              <li class="info-item-list-item">Обязательный паевой — <b> 10 р.</b></li>
                              <li class="info-item-list-item">Членский — <b>10 р.</b></li>
      						</ul>
      					</div>
     				</div>
    			</div>
   			</div>
			<div class="info-block">
				<div class="purple-block">
					<div class="purple-block-image">
						<img src="https://trest24.ru/img/waring-icon.webp" alt="alert">
     				</div>
					<div class="purple-block-text">
						В случае прекращения членства в Кооперативе, пайщику возвращается сумма его паенакопления (пая), 
						включая сумму паевых взносов и присоединенных начислений на паевой взнос, если присоединение 
						допускается законом.
     				</div>
    			</div>
				<div class="purple-block">
					<div class="purple-block-image">
						<img src="https://trest24.ru/img/waring-icon.webp" alt="alert">
     				</div>
					<div class="purple-block-text">
						В случае прекращения членства в Кооперативе, пайщику возвращается сумма его паенакопления (пая), 
						включая сумму паевых взносов и присоединенных начислений на паевой взнос, если присоединение 
						допускается законом.
     				</div>
    			</div>
   			</div>
			<div class="info-block">
    			<h2>Заинтересовало? Оставьте заявку и мы Вам позвоним!</h2>
				<form data-type="dynamic-form" end_point="https://trest24.ru/turbo_add_task.php">
                    <div type="input-block">
                        <span type="input" name="name" label="Имя" input-type="text" placeholder="Иван Иванов" required="true"></span>
                        <span type="input" name="phone" label="Телефон" input-type="text" placeholder="+7(XXX)XXX-XX-XX" required="true"></span>
                        <button type="submit" text="Оставить заявку"></button>
                    </div>
                    <div type="result-block">
                        <span type="text" field="description"></span>
                        <span type="link" field="link"></span>
                    </div>
                </form>
   			</div>
  		</div>';

        $item .= self::getPageFooter() . ']]></turbo:content></item>';

        return $item;
    }

    public static function getDocsItem()
    {
        $item = self::getPageHeader('Управляющие документы КПК ТРЕСТ', 'https://trest24.ru/doc', 'Управляющие документы');

        $item .= '<div class="docs">
			<div class="info-block">
				<div class="info-item">
					<div class="info-item-image">
						<img src="https://trest24.ru/img/file-doc.webp" alt="doc">
					</div>
					<a href="https://trest24.ru/file/upload/%D0%98%D0%BD%D1%84%D0%BE%D1%80%D0%BC%D0%B0%D1%86%D0%B8%D1%8F%20%D0%BE%20%D1%80%D0%B0%D0%B7%D0%BC%D0%B5%D1%80%D0%B5%20%D0%B2%D0%B7%D0%BD%D0%BE%D1%81%D0%BE%D0%B2%20%D0%B8%20%D0%BE%D1%82%D0%B2%D0%B5%D1%82%D1%81%D1%82%D0%B2%D0%B5%D0%BD%D0%BD%D0%BE%D1%81%D1%82%D0%B8%20%D0%BF%D0%B0%D0%B9%D1%89%D0%B8%D0%BA%D0%BE%D0%B2%20%D0%9A%D0%9F%D0%9A%20%D0%A2%D0%A0%D0%95%D0%A1%D0%A2.docx">Информация о размере взносов и ответственности пайщиков КПК ТРЕСТ</a>
    			</div>
				<div class="info-item">
					<div class="info-item-image">
						<img src="https://trest24.ru/img/file-doc.webp" alt="doc">
					</div>
					<a href="https://trest24.ru/file/upload/%D0%91%D0%A1%20%D0%B7%D0%B0%D1%89%D0%B8%D1%82%D1%8B%20%D0%BF%D1%80%D0%B0%D0%B2%20%D0%B8%20%D0%B8%D0%BD%D1%82%D0%B5%D1%80%D0%B5%D1%81%D0%BE%D0%B2%20%D0%A4%D0%9B%20%D0%B8%20%D0%AE%D0%9B,%20%D0%A1%D0%A0%D0%9E.pdf">БС защиты прав и интересов ФЛ и ЮЛ, СРО</a>
    			</div>
				<div class="info-item">
					<div class="info-item-image">
						<img src="https://trest24.ru/img/file-doc.webp" alt="doc">
					</div>
					<a href="https://trest24.ru/file/upload/%D0%A3%D1%81%D1%82%D0%B0%D0%B2%20%D0%9A%D0%9F%D0%9A%20%D0%A2%D1%80%D0%B5%D1%81%D1%82%20%D1%80%D0%B5%D0%B4%D0%B0%D0%BA%D1%86%D0%B8%D1%8F%20%D0%BE%D1%82%2026.08.2021.pdf">Устав КПК Трест редакция от 26.08.2021</a>
    			</div>
				<div class="info-item">
					<div class="info-item-image">
						<img src="https://trest24.ru/img/file-doc.webp" alt="doc">
					</div>
					<a href="https://trest24.ru/file/upload/%D0%A1%D0%B2-%D0%B2%D0%BE%20%D0%98%D0%9D%D0%9D%20%D0%A2%D1%80%D0%B5%D1%81%D1%82.pdf">Св-во ИНН Трест</a>
    			</div>
				<div class="info-item">
					<div class="info-item-image">
						<img src="https://trest24.ru/img/file-doc.webp" alt="doc">
					</div>
					<a href="https://trest24.ru/file/upload/%D0%9B%D0%B8%D1%81%D1%82%20%D0%B7%D0%B0%D0%BF%D0%B8%D1%81%D0%B8%20%D0%9A%D0%9F%D0%9A%20%D0%A2%D0%A0%D0%95%D0%A1%D0%A2%2013.03.2018.pdf">Лист записи КПК ТРЕСТ 13.03.2018</a>
    			</div>
				<div class="info-item">
					<div class="info-item-image">
						<img src="https://trest24.ru/img/file-doc.webp" alt="doc">
					</div>
					<a href="https://trest24.ru/file/upload/%D0%A1%D0%B2%D0%B8%D0%B4%D0%B5%D1%82%D0%B5%D0%BB%D1%8C%D1%81%D1%82%D0%B2%D0%BE%20%D0%A1%D0%A0%D0%9E%20%D0%A2%D1%80%D0%B5%D1%81%D1%821.pdf">Свидетельство СРО Трест</a>
    			</div>
   			</div>
  		</div>';

        $item .= self::getPageFooter() . ']]></turbo:content></item>';

        return $item;
    }

    public static function getRequisitesItem()
    {
        $item = self::getPageHeader('Реквизиты КПК ТРЕСТ', 'https://trest24.ru/requisites', 'Реквизиты');

        $item .= '<div class="requisites">
			<div class="info-block">
				<div class="info-item">
					<p>
      					<b>Полное наименование:</b>
					</p>
					<p>
						Кредитный потребительский кооператив «ТРЕСТ»
     				</p>
    			</div>
				<div class="info-item">
					<p>
      					<b>Сокращённое наименование:</b>
					</p>
					<p>
						КПК «ТРЕСТ»
     				</p>
    			</div>
				<div class="info-item">
					<p>
      					<b>ИНН:</b>
					</p>
					<p>			
                      6829140628
     				</p>
    			</div>
				<div class="info-item">
					<p>
      					<b>ОГРН:</b>
					</p>
					<p>			
                      1186820002170
     				</p>
    			</div>
				<div class="info-item">
					<p>
      					<b>Юридический адрес:</b>
					</p>
					<p>
						Москва, Красная Пресня 29
     				</p>
    			</div>
				<div class="info-item">
					<p>
      					<b>Фактический адрес:</b>
					</p>
					<p>
						Москва, Красная Пресня 29
     				</p>
    			</div>
				<div class="info-item">
					<p>
      					<b>Телефон, факс:</b>
					</p>
					<p>
						8 800 600-50-09
     				</p>
    			</div>
				<div class="info-item">
					<p>
      					<b>Электронная почта:</b>
					</p>
					<p>
						info@trest24.ru
     				</p>
    			</div>
				<div class="info-item">
					<p>
      					<b>Интернет-сайт:</b>
					</p>
					<p>
						trest24.ru
     				</p>
    			</div>
   			</div>
  		</div>';

        $item .= self::getPageFooter() . ']]></turbo:content></item>';

        return $item;
    }

    public static function getMskItem()
    {
        $item = self::getPageHeader('Кредит под материнский капитал в КПК ТРЕСТ - Москва и другие города России', 'https://trest24.ru/zaym/materinskii-kapital', 'Займ по программе «Материнский капитал»');

        $item .= '<div class="msk">
			<div class="dashed-block">
				Семьям, желающим использовать деньги материнского капитала на покупку или строительство жилья, 
				ТРЕСТ предлагает получить займ на выгодных условиях.
   			</div>
			<div class="info-block">
				<img src="https://trest24.ru/img/girls-in-yellow.webp" alt="msk">
   			</div>
			<div class="info-block">
    			<h2>Преимущества</h2>
				<div class="grey-block">
					<div class="grey-block-image">
						<img src="https://trest24.ru/img/advantages-1.webp" alt="advantages-1">
     				</div>
         			<p class="text-center"><b>Рассмотрим Вашу заявку в течение 2-х часов</b></p>
					<p>
						Забудьте про длительные ожидания, которые приходится терпеть при обращении в банк. 
						С нами Вам действительно не нужно долго ждать.
					</p>
    			</div>
				<div class="grey-block">
					<div class="grey-block-image">
						<img src="https://trest24.ru/img/advantages-2.webp" alt="advantages-2">
     				</div>
         			<p class="text-center"><b>Выдача займа не зависит от Вашей кредитной истории</b></p>
					<p>Вам не нужно подтверждать сведения о своем доходе и проходить проверку кредитной истории. 
					Мы не требуем от Вас собирать многочисленные документы для подтверждения Вашего дохода.</p>
    			</div>
				<div class="grey-block">
					<div class="grey-block-image">
						<img src="https://trest24.ru/img/advantages-3.webp" alt="advantages-3">
     				</div>
         			<p class="text-center"><b>Юридическая поддержка и сопровождение</b></p>
					<p>Мы сами подготовим для Вас все необходимые документы, окажем полное юридическое сопровождение сделки.</p>
    			</div>
				<div class="grey-block">
					<div class="grey-block-image">
						<img src="https://trest24.ru/img/advantages-4.webp" alt="advantages-4">
     				</div>
         			<p class="text-center"><b>Разумные проценты по займам</b></p>
					<p>Стоимость зависит от вида сделки, которую Вы намерены совершить с  использованием материнского капитала. 
					Вы заранее узнаете точную стоимость услуги. Никаких сложных систем оплаты. Все предельно просто и понятно.</p>
    			</div>
   			</div>
			<div class="info-block">
    			<h2>Как можно использовать материнский капитал?</h2>
				<div class="info-item-list">
					<ul>
      					<li>
							<div class="image">
								<img src="https://trest24.ru/img/list-circle.webp" alt="point">
       						</div>
       						<span>Купить дом</span>
						</li>
						<li>
							<div class="image">
								<img src="https://trest24.ru/img/list-circle.webp" alt="point">
       						</div>
							<span>Купить квартиру</span>
						</li>
						<li>
							<div class="image">
								<img src="https://trest24.ru/img/list-circle.webp" alt="point">
       						</div>
							<span>Начать строительство индивидуального жилого дома</span>
						</li>
						<li>
							<div class="image">
								<img src="https://trest24.ru/img/list-circle.webp" alt="point">
       						</div>
							<span>Купить комнату в коммунальной квартире или в общежитии</span>
						</li>
						<li>
							<div class="image">
								<img src="https://trest24.ru/img/list-circle.webp" alt="point">
       						</div>
							<span>Выкупить долю в квартире или в доме до полной собственности</span>
						</li>
						<li>
							<div class="image">
								<img src="https://trest24.ru/img/list-circle.webp" alt="point">
       						</div>
							<span>Обменять свою квартиру на лучшую с доплатой средствами материнского капитала</span>
						</li>
						<li>
							<div class="image">
								<img src="https://trest24.ru/img/list-circle.webp" alt="point">
       						</div>
							<span>Купить квартиру в строящемся доме по договору долевого участия или договору уступки</span>
						</li>
						<li>
							<div class="image">
								<img src="https://trest24.ru/img/list-circle.webp" alt="point">
       						</div>
							<span>Завершить строительство индивидуального жилого дома 
							(в том числе если объект зарегистрирован как объект незавершенного строительства)</span>
						</li>
     				</ul>
     				<p>*Сделки по покупке недвижимого имущества могут совершаться в том числе между родственниками</p>
    			</div>
   			</div>
			<div class="wide-purple-block">
				<div class="dark-purple-block text-center">
					<div class="dark-purple-block-image">
						<img src="https://trest24.ru/img/icon-many.webp" alt="money">
					</div>
					<p>
      					<b>Материнский капитал</b>
     				</p>
					<p>
						586 946 руб. 72 коп. или 775 628 руб. 25 коп.
     				</p>
				</div>
				<div class="dark-purple-block text-center">
					<div class="dark-purple-block-image">
						<img src="https://trest24.ru/img/icon-many.webp" alt="money">
					</div>
					<p>
      					<b>Региональный семейный капитал (в зависимости от региона)</b>
     				</p>
					<p>
						от 100 000 руб. до 1 000 000 руб
     				</p>
				</div>
				<div class="dark-purple-block text-center">
					<div class="dark-purple-block-image">
						<img src="https://trest24.ru/img/icon-many.webp" alt="money">
					</div>
					<p>
      					<b>Господдержка на третьего ребенка</b>
     				</p>
					<p>
						450 000 руб.
     				</p>
				</div>
				<div class="info-block">
                  <form data-type="dynamic-form" end_point="https://trest24.ru/turbo_add_task.php">
                      <div type="input-block">
                          <span type="input" name="name" label="Имя" input-type="text" placeholder="Иван Иванов" required="true"></span>
                          <span type="input" name="phone" label="Телефон" input-type="text" placeholder="+7(XXX)XXX-XX-XX" required="true"></span>
                          <button type="submit" text="Оставить заявку"></button>
                      </div>
                      <div type="result-block">
                          <span type="text" field="description"></span>
                          <span type="link" field="link"></span>
                      </div>
                  </form>
   				</div>
   			</div>
  		</div>';

        $item .= self::getPageFooter() . ']]></turbo:content></item>';

        return $item;
    }

    public static function getRskItem()
    {
        $item = self::getPageHeader('Кредит по программе Регионального семейного капитала в Москве и других городах России', 'https://trest24.ru/zaym/semeynii-kapital', 'Займ по программе «Региональный семейный капитал»');

        $item .= '<div class="rsk">
			<div class="dashed-block">
              	<p>
					Региональный семейный капитал (РСК) или Областной материнский (семейный) — установлен Законом той области, 
					в которой проживает гражданин. Семейный капитал предоставляется гражданам независимо от получения иных мер 
					социальной поддержки, предусмотренных федеральным и региональным законодательством, если ранее они 
					не воспользовались правом на его получение.
              	</p>
				<p>
					Размер регионального семейного капитала устанавливается на уровне каждой области отдельно и составляет 
					от 100 000 руб. до 1 000 000 руб.
              	</p>
   			</div>
			<div class="info-block">
				<img src="https://trest24.ru/img/z-rsk-img.webp" alt="rsk">
   			</div>
			<div class="info-block">
				<div class="grey-block">
					<div class="grey-block-image">
						<img src="https://trest24.ru/img/yellow-shield.webp" alt="shield">
     				</div>
         			<p>
						ТРЕСТ осуществляет выдачу ипотечных займов с возможностью погашения
                        Региональным семейным капиталом.  Ипотечные займы выдаются на всей территории
                        Российской Федерации в зависимости от места проживания, Размер регионального
                        семейного капитала устанавливается на уровне каждой области отдельно и
                        составляет от 100 000 руб. до 1 000 000 руб
					</p>
    			</div>
				<div class="grey-block">
					<div class="grey-block-image">
						<img src="https://trest24.ru/img/yellow-shield.webp" alt="shield">
     				</div>
         			<p>
						Право на предоставление семейного капитала и порядок предоставления нужно уточнять
                        в областном правительстве по месту проживания гражданина.
					</p>
    			</div>
				<div class="grey-block">
					<div class="grey-block-image">
						<img src="https://trest24.ru/img/yellow-shield.webp" alt="shield">
     				</div>
         			<p>
						Региональный семейный капитал можно суммировать с другими федеральными
                        сертификатами — Материнским семейным капиталом и Господдержкой на третьего ребенка
                        в размере 450 000 руб.
					</p>
    			</div>
   			</div>
			<div class="info-block">
    			<h2>Как можно использовать материнский капитал?</h2>
				<div class="info-item-list">
					<ul>
						<li>
							<div class="image">
								<img src="https://trest24.ru/img/ul-1.webp" alt="advantage-1">
       						</div>
							<div>
        						<b>Деньги выдаем быстро</b>
								<p>
									В течение 1 дня мы рассмотрим Вашу заявку. Деньги Вы получите уже через 5-7 дней 
									(после регистрации договора залога в Росреестре).
        						</p>
							</div>
						</li>
						<li>
							<div class="image">
								<img src="https://trest24.ru/img/ul-2.webp" alt="advantage-2">
       						</div>
							<div>
        						<b>Лояльно относимся к кредитной истории</b>
								<p>
									Допускаем, что у Вас могут быть другие действующие кредиты. Мы понимаем, что далеко 
									не у всех кредитная история идеальна.
        						</p>
							</div>
						</li>
						<li>
							<div class="image">
								<img src="https://trest24.ru/img/ul-3.webp" alt="advantage-3">
       						</div>
							<div>
        						<b>Принимаем минимальный пакет документов</b>
								<p>
									Минимум документов под заёмщика и по объекту недвижимости, предоставляемому в залог
        						</p>
							</div>
						</li>
						<li>
							<div class="image">
								<img src="https://trest24.ru/img/ul-4.webp" alt="advantage-4">
       						</div>
							<div>
        						<b>Не требуем страхования жизни и недвижимости</b>
								<p>
									Это избавит Вас от лишних затрат. При этом страховку Вы можете оформить по своему желанию.
        						</p>
							</div>
						</li>
						<li>
							<div class="image">
								<img src="https://trest24.ru/img/ul-5.webp" alt="advantage-5">
       						</div>
							<div>
        						<b>Оценку объекта мы сделаем сами</b>
								<p>
									Сотрудники кооператива самостоятельно проведут осмотр объекта недвижимости и сделают оценку его рыночной стоимости
        						</p>
							</div>
						</li>
     				</ul>
    			</div>
   			</div>
			<div class="info-block">
				<img src="https://trest24.ru/img/z-rsk-home.webp" alt="house">
   			</div>
			<div class="info-block">
                  <form data-type="dynamic-form" end_point="https://trest24.ru/turbo_add_task.php">
                      <div type="input-block">
                          <span type="input" name="name" label="Имя" input-type="text" placeholder="Иван Иванов" required="true"></span>
                          <span type="input" name="phone" label="Телефон" input-type="text" placeholder="+7(XXX)XXX-XX-XX" required="true"></span>
                          <button type="submit" text="Оставить заявку"></button>
                      </div>
                      <div type="result-block">
                          <span type="text" field="description"></span>
                          <span type="link" field="link"></span>
                      </div>
                  </form>
   			</div>
  		</div>';

        $item .= self::getPageFooter() . ']]></turbo:content></item>';

        return $item;
    }

//    public static function getStateSupportItem()
//    {
//        $item = self::getPageHeader('Кредит по программе господдержки 450000 рублей в Москве и других городах России', 'https://trest24.ru/zaym/450000', 'Займ по программе «Господдержка 450 000 рублей»');
//
//        $item .= '<div class="state">
//			<div class="dashed-block">
//              	<p>
//					В соответствии с Федеральным законом от 03.07.2019 года № 157-ФЗ граждане,
//     				у которых в период с <b>1 января 2019 года по 31 декабря 2022</b> года родился третий
//					или последующие дети имеют право на получение государственной поддержки для целей
//					полного или частичного погашения задолженности по ипотечному кредиту (займу) в размере
//     				не более <b>450 тысяч рублей</b>.
//              	</p>
//				<p>
//					Кредитный кооператив оказывает информационные услуги членам кооператива по подбору кредитной
//					организации с целью оформления ипотечного займа с возможностью последующего погашения за счет
//					средств господдержки в размере до 450 000 рублей.
//              	</p>
//   			</div>
//			<div class="info-block">
//				<img src="https://trest24.ru/img/drf-img-top.webp" alt="state">
//   			</div>
//			<div class="info-block">
//    			<h2>Критерии для участия в программе:</h2>
//				<div class="grey-block">
//         			Если остаток по ипотечному займу меньше 450 тысяч, то оставшиеся после погашения деньги
//					государство никак не компенсирует. Получить «остаток» невозможно.
//    			</div>
//				<div class="grey-block">
//					Воспользоваться государственной поддержкой можно только один раз, погасить только один ипотечный займ.
//					Повторно участвовать в программе нельзя.
//    			</div>
//				<div class="grey-block">
//     				Договор займа должен быть заключен до <b>1 июля 2023 года</b>, то есть все действующие ипотечные договоры можно погасить,
//					используя данную программу. Если вы ранее рефинансировали ипотечный договор - он также подходит под условия программы.
//    			</div>
//				<div class="grey-block">
//     				450 000 рублей нельзя использовать в качестве первоначального взноса при оформлении ипотечного займа.
//					Этими деньгами можно погасить только уже оформленный займ.
//    			</div>
//				<div class="grey-block">
//     				Подать заявление на погашение 450 тысяч может отец или мать троих и более детей, являющийся заемщиком или со-заёмщиком.
//    			</div>
//				<div class="grey-block">
//     				Одновременно с программой поддержки можно использовать сертификаты на федеральный и областной материнские капиталы.
//    			</div>
//				<div class="grey-block">
//     				Третий или последующий ребенок должен быть рожден или усыновлён в 2019, 2020, 2021 или 2022 г.
//    			</div>
//				<div class="grey-block">
//     				Нет ограничений по возрасту заемщиков, их статусу или доходам.
//    			</div>
//				<div class="grey-block">
//     				Наделять детей долями в недвижимости не обязательно.
//    			</div>
//				<div class="grey-block">
//     				Платить налог (НДФЛ) с 450 000 рублей не требуется.
//    			</div>
//   			</div>
//			<div class="info-block">
//                  <form data-type="dynamic-form" end_point="https://trest24.ru/turbo_add_task.php">
//                      <div type="input-block">
//                          <span type="input" name="name" label="Имя" input-type="text" placeholder="Иван Иванов" required="true"></span>
//                          <span type="input" name="phone" label="Телефон" input-type="text" placeholder="+7(XXX)XXX-XX-XX" required="true"></span>
//                          <button type="submit" text="Оставить заявку"></button>
//                      </div>
//                      <div type="result-block">
//                          <span type="text" field="description"></span>
//                          <span type="link" field="link"></span>
//                      </div>
//                  </form>
//   			</div>
//  		</div>';
//
//        $item .= self::getPageFooter() . ']]></turbo:content></item>';
//
//        return $item;
//    }

    public static function getEstateItem()
    {
        $item = self::getPageHeader('Займы и кредиты под залог недвижимости в КПК ТРЕСТ - Москва и другие города России', 'https://trest24.ru/zaym/pod-zalog-nedvizhimosti', 'Займ под залог недвижимости');

        $item .= '<div class="estate">
			<div class="dashed-block">
              	Займ под залог — позволяет быстро получить крупную сумму денег. 
				В заложенной недвижимости можно продолжать проживать, сдавать в аренду 
				или использовать для предпринимательских целей.
   			</div>
			<div class="info-block">
				<img src="https://trest24.ru/img/z-home.webp" alt="estate">
   			</div>
			<div class="info-block">
    			<h2>Кто может получить займ под залог недвижимости?</h2>
    			<div class="info-item-list">
					<ul>
                      <li>
                          <div class="image">
                              <img src="https://trest24.ru/img/yellow-shield.webp" alt="shield">
                          </div>
                          <div>
                              <b>Индивидуальные предприниматели, руководители и собственники бизнеса</b>
                              <p>
                                На открытие и развитие бизнеса. Чаще всего средства используются на приобретение основных средств, 
								на пополнение оборотых средств, на покрытие кассовых разрывов, на участие в тендерах, на зарплату 
								сотрудникам и оплату аренды. Иногда в ожидании решения банка по крупному кредиту у нас оформляют заем, 
								чтобы не упустить выгодную сделку.
                              </p>
                          </div>
                      </li>
					<li>
                          <div class="image">
                              <img src="https://trest24.ru/img/yellow-shield.webp" alt="shield">
                          </div>
                          <div>
                              <b>Физические лица (в т.ч. предпенсионного и пенсионного возраста)</b>
                              <p>
                                Для оперативного решения финансовых вопросов: на приобретение новой квартиры 
								на время продажи старой, на обучение детей и внуков, на дорогостоящее лечение, 
								на автомобиль и другие крупные покупки.
                              </p>
                          </div>
                      </li>
						<li>
                          <div class="image">
                              <img src="https://trest24.ru/img/yellow-shield.webp" alt="shield">
                          </div>
                          <div>
                              <b>Лица, которым отказали в выдаче кредита в банке</b>
                              <p>
                                Причинами для отказа может быть плохая кредитная история или ее отсутствие, 
								неофициальное трудоустройство, большая кредитная нагрузка, долги по исполнительному производству.
                              </p>
                          </div>
                      </li>
    				</ul>
				</div>
   			</div>
			<div class="wide-grey-block">
				<div class="info-block">
     				<h2>Что может служить залогом?</h2>
					<div class="info-item">
      					<div class="info-item-number">1</div>
      					<div>
							<p>
        						<b>Приобретаемое жилье или другая недвижимость</b>
       						</p>
							<p>
								Это касается займов, которые оформляются на покупку объекта недвижимости. 
								Вы будете жить в новой квартире, и расплачиваться за нее постепенно.
       						</p>
						</div>
     				</div>
					<div class="info-item">
      					<div class="info-item-number">2</div>
      					<div>
							<p>
        						<b>Объект недвижимости, который не принадлежит заемщику</b>
       						</p>
							<p>
								Залог могут предоставить родственники, друзья или партнеры заемщика
       						</p>
						</div>
     				</div>
					<div class="info-item">
      					<div class="info-item-number">3</div>
      					<div>
							<p>
        						<b>Жилой дом, квартира, комната, дача, садовый дом с земельным участком, коммерческая недвижимость</b>
       						</p>
							<p>
								При этом жилое помещение может быть единственным и из него не нужно выписываться. Недвижимость остается 
								в Вашей собственности, Вы продолжаете ею пользоваться, а на объект накладывается обременение на время 
								действия договора.
       						</p>
						</div>
     				</div>
    			</div>
				<div class="info-block">
					<img src="https://trest24.ru/file/upload/2b9448f5ab7960c37993b2bae62f31e9.png" alt="estate">
    			</div>
				<div class="info-block">
					<form data-type="dynamic-form" end_point="https://trest24.ru/turbo_add_task.php">
                      <div type="input-block">
                          <span type="input" name="name" label="Имя" input-type="text" placeholder="Иван Иванов" required="true"></span>
                          <span type="input" name="phone" label="Телефон" input-type="text" placeholder="+7(XXX)XXX-XX-XX" required="true"></span>
                          <button type="submit" text="Оставить заявку"></button>
                      </div>
                      <div type="result-block">
                          <span type="text" field="description"></span>
                          <span type="link" field="link"></span>
                      </div>
                  </form>
    			</div>
   			</div>
  		</div>';

        $item .= self::getPageFooter() . ']]></turbo:content></item>';

        return $item;
    }

    public static function getConsumerItem()
    {
        $item = self::getPageHeader('Оформить потребительский займ в КПК ТРЕСТ в городе Москва и других городах России', 'https://trest24.ru/zaym/potreb-kredit', 'Займ потребительский');

        $item .= '<div class="consumer">
			<div class="dashed-block">
              	ТРЕСТ предлагает займ на любые цели (отдых, лечение и т.п.) на предельно выгодных условиях. 
				Низкие проценты и минимум требуемых документов.
   			</div>
			<div class="info-block">
				<img src="https://trest24.ru/img/men-in-glasses.webp" alt="consumer">
   			</div>
			<div class="info-block">
    			<div class="info-item">
					<div class="info-item-image">
						<img src="https://trest24.ru/img/check.webp" alt="check">
     				</div>
					<p class="text-center">
      					<b>Выдача займа не привязана к Вашей кредитной истории</b>
     				</p>
     				<p class="text-center">
						Это означает, что мы индивидуально подходим к Вашей кредитной истории
					</p>
				</div>
				<div class="info-item">
					<div class="info-item-image">
						<img src="https://trest24.ru/img/check.webp" alt="check">
     				</div>
					<p class="text-center">
      					<b>Получение займа в день обращения</b>
     				</p>
     				<p class="text-center">
						Обычно рассмотрение заявки на кредитование занимает до 1 дня. 
						Скорее всего Вы получите займ уже в день обращения! При этом скорость 
						получения абсолютно не влияет на стоимость займа
					</p>
				</div>
				<div class="info-item">
					<div class="info-item-image">
						<img src="https://trest24.ru/img/check.webp" alt="check">
     				</div>
					<p class="text-center">
      					<b>Вам понадобится минимум документов</b>
     				</p>
     				<p class="text-center">
						Сбор всех необходимых документов для получения кредита в банке занимает очень много времени, которого 
						и так всегда не хватает. Мы это понимаем, поэтому для получения займа Вам понадобится минимальный 
						пакет документов.
					</p>
				</div>
				<div class="info-item">
					<div class="info-item-image">
						<img src="https://trest24.ru/img/check.webp" alt="check">
     				</div>
					<p class="text-center">
      					<b>Условия предоставления потребительских займов</b>
     				</p>
     				<p class="text-center">
						При досрочном частичном или полном погашении займа дополнительная комиссия не взимается. 
						Уставом кооператива предусмотрена уплата членского и добровольного паевого взноса. 
						При исполнении обязательств по договору займа, добровольный паевой взнос возвращается в полном объеме.
					</p>
				</div>
   			</div>
			<div class="info-block">
             <form data-type="dynamic-form" end_point="https://trest24.ru/turbo_add_task.php">
                              <div type="input-block">
                                  <span type="input" name="name" label="Имя" input-type="text" placeholder="Иван Иванов" required="true"></span>
                                  <span type="input" name="phone" label="Телефон" input-type="text" placeholder="+7(XXX)XXX-XX-XX" required="true"></span>
                                  <button type="submit" text="Оставить заявку"></button>
                              </div>
                              <div type="result-block">
                                  <span type="text" field="description"></span>
                                  <span type="link" field="link"></span>
                              </div>
              </form>
    		</div>
  		</div>';

        $item .= self::getPageFooter() . ']]></turbo:content></item>';

        return $item;
    }

    public static function getDepositItem()
    {
        $item = self::getPageHeader('Воспользуйтесь выгодными программами вкладов КПК ТРЕСТ в Москве и других городах России. Прозрачная отчетность, высокая доходность по вкладам, сохранение и преумножение финансов вкладчиков.', 'https://trest24.ru/deposit', 'Сберегательные программы');

        $item .= '<div class="saving">
			<div class="dashed-block">
              	Отличная репутация компании, профессиональная команда, — делают Ваши вложения в ТРЕСТ лучшим стратегическим 
				решением для сохранения и приумножения сбережений.
   			</div>
			<div class="info-block">
				<img src="https://trest24.ru/img/qwert.webp" alt="bp">
   			</div>
   			<div class="info-block" style="text-align: center!important">
				<a href="tel:+79686568011" style="color: #8757E8; text-align: center!important">
				    +7 (968) 656-80-11
				</a>
   			</div>
			<div class="info-block">
    			<table class="table">
    			    <thead>
    			        <th colspan="4">
    			            ЛЕГКИЙ СТАРТ
                        </th>
                    </thead>
                    <tbody>
                        <tr>
                                <td>
                                    Срок размещения<br>
                                    (месяцы)
                                </td>
                                <td>
                                    6
                                </td>
                                <td>
                                    12
                                </td>
                                <td>
                                    24
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Минимальная сумма (рубли)
                                </td>
                                <td colspan="3">
                                    от 100 000
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Процентная ставка (% годовых)
                                </td>
                                <td>
                                    10,5
                                </td>
                                <td>
                                    11,5
                                </td>
                                <td>
                                    12,5
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Выплата процентов
                                </td>
                                <td colspan="2">
                                    В конце срока
                                </td>
                                <td>
                                    Ежемесячно / в конце срока
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Пополнение
                                </td>
                                <td colspan="3">
                                    Да
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Частичное снятие
                                </td>
                                <td>
                                    Нет
                                </td>
                                <td>
                                    Нет
                                </td>
                                <td>
                                    Нет
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Капитализация процентов
                                </td>
                                <td colspan="3">
                                    Нет
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Досрочное расторжение<br>
                                    (% годовых)
                                </td>
                                <td colspan="3">
                                    0,1
                                </td>
                   </tr>
                    </tbody>
				</table>
				
				<table class="table">
    			    <thead>
    			        <th colspan="4">
    			            СТАБИЛЬНЫЙ ДОХОД
                        </th>
                    </thead>
                    <tbody>
                        <tr>
                                <td>
                                    Срок размещения<br>
                                    (месяцы)
                                </td>
                                <td>
                                    6
                                </td>
                                <td>
                                    12
                                </td>
                                <td>
                                    24
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Минимальная сумма (рубли)
                                </td>
                                <td colspan="3">
                                    от 500 000
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Процентная ставка (% годовых)
                                </td>
                                <td>
                                    11,5
                                </td>
                                <td>
                                    12,5
                                </td>
                                <td>
                                    13,5
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Выплата процентов
                                </td>
                                <td>
                                    В конце срока
                                </td>
                                <td colspan="2">
                                    Ежемесячно / в конце срока
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Пополнение
                                </td>
                                <td colspan="3">
                                    Да
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Частичное снятие
                                </td>
                                <td colspan="2">
                                    Нет
                                </td>
                                <td>
                                    Да
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Капитализация процентов
                                </td>
                                <td colspan="3">
                                    Нет
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Досрочное расторжение<br>
                                    (% годовых)
                                </td>
                                <td>
                                    0,1
                                </td>
                                <td>
                                    1
                                </td>
                                <td>
                                    1,5
                                </td>
                   </tr>
                    </tbody>
				</table>
				
				<table class="table">
    			    <thead>
    			        <th colspan="4">
    			            МАКСИМАЛЬНЫЙ ДОХОД
                        </th>
                    </thead>
                    <tbody>
                        <tr>
                                <td>
                                    Срок размещения<br>
                                    (месяцы)
                                </td>
                                <td>
                                    6
                                </td>
                                <td>
                                    12
                                </td>
                                <td>
                                    24
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Минимальная сумма (рубли)
                                </td>
                                <td colspan="3">
                                    от 1 000 000
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Процентная ставка (% годовых)
                                </td>
                                <td>
                                    12,5
                                </td>
                                <td>
                                    13,5
                                </td>
                                <td>
                                    14,5
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Выплата процентов
                                </td>
                                <td>
                                    В конце срока
                                </td>
                                <td colspan="2">
                                    Ежемесячно / в конце срока
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Пополнение
                                </td>
                                <td colspan="3">
                                    Да
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Частичное снятие
                                </td>
                                <td>
                                    Нет
                                </td>
                                <td colspan="2">
                                    Да
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Капитализация процентов
                                </td>
                                <td colspan="3">
                                    Нет
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Досрочное расторжение<br>
                                    (% годовых)
                                </td>
                                <td>
                                    1
                                </td>
                                <td>
                                    1,5
                                </td>
                                <td>
                                    3
                                </td>
                   </tr>
                    </tbody>
				</table>
				
				<table class="table table-yellow">
    			    <thead>
    			        <th colspan="2">
    			            ПРОМО
                        </th>
                    </thead>
                    <tbody>
                        <tr>
                                <td>
                                    Срок размещения<br>
                                    (месяцы)
                                </td>
                                <td>
                                    3
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Минимальная сумма (рубли)
                                </td>
                                <td>
                                    от 50 000
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Процентная ставка (% годовых)
                                </td>
                                <td >
                                    8,5
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Выплата процентов
                                </td>
                                <td>
                                    В конце срока
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Пополнение
                                </td>
                                <td>
                                    Да
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Частичное снятие
                                </td>
                                <td>
                                    Нет
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Капитализация процентов
                                </td>
                                <td>
                                    Нет
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Досрочное расторжение<br>
                                    (% годовых)
                                </td>
                                <td>
                                    0,1
                                </td>
                   </tr>
                    </tbody>
				</table>
   			</div>
   			<div class="info-block">
				<h2>
				    СОХРАННОСТЬ СБЕРЕЖЕНИЙ
				</h2>
				<div>
				    Непосредственный надзор Центрального банка Российской Федерации и соблюдение всех необходимых финансовых нормативов – делает вложения денежных средств в Кооператив безопасными.
				</div>
   			</div>
			<div class="wide-purple-block">
    			<h2>
    			    Дополнительные уровни безопасности
    			</h2>
				<div class="info-item">
					<div class="info-item-image">
						<img src="https://trest24.ru/img/yellow-shield.webp" alt="shield">
					</div>
					<div>
						В соответствии с Положением о выдаче займов и финансовой стратегией Кооператива, денежные 
						средства, распределяемые на выдачу займов, выдаются только на займы с высоким уровнем 
						обеспечения: «Займы под залог недвижимости», «Займы на покупку жилья», «Займы под поручительство 
						третьих лиц» - что является гарантией возврата займов и соответственно сохранности сбережений.
     				</div>
				</div>
				<div class="info-item">
					<div class="info-item-image">
						<img src="https://trest24.ru/img/yellow-shield.webp" alt="shield">
					</div>
					<div>
						Профессиональная команда Кооператива, включающая в себя председателя правления, заместителей 
						и руководителей ключевых подразделений, имеет опыт работы в финансовом секторе более 15 лет, 
						что позволяет осуществлять стабильную и эффективную работу Кооператива и соответственно 
						гарантировать сохранность и возвратность вложенных сбережений вместе с процентами.
     				</div>
				</div>
				<div class="info-item">
					<div class="info-item-image">
						<img src="https://trest24.ru/img/yellow-shield.webp" alt="shield">
					</div>
					<div>
						Собственный резервный фонд Кооператива, денежные средства которого могут быть использованы 
						только для обеспечения непредвиденных расходов и возврата сбережений пайщикам.
     				</div>
				</div>
				<div class="info-item">
					<div class="info-item-image">
						<img src="https://trest24.ru/img/yellow-shield.webp" alt="shield">
					</div>
					<div>
						Установленные отчисления Кооператива в Компенсационный фонд Саморегулируемой организации, 
						являются аналогией системе страхования банковских вкладов АСВ.
     				</div>
				</div>
				<div class="info-block">
             <form data-type="dynamic-form" end_point="https://trest24.ru/turbo_add_task.php">
                              <div type="input-block">
                                  <span type="input" name="name" label="Имя" input-type="text" placeholder="Иван Иванов" required="true"></span>
                                  <span type="input" name="phone" label="Телефон" input-type="text" placeholder="+7(XXX)XXX-XX-XX" required="true"></span>
                                  <button type="submit" text="Оставить заявку"></button>
                              </div>
                              <div type="result-block">
                                  <span type="text" field="description"></span>
                                  <span type="link" field="link"></span>
                              </div>
              </form>
    		</div>
			</div>
  		</div>';

        $item .= self::getPageFooter() . ']]></turbo:content></item>';

        return $item;
    }

    public static function getContactsItem()
    {
        $item = self::getPageHeader('Контакты КПК ТРЕСТ', 'https://trest24.ru/contacts', 'Главный офис');

        $item .= '<div class="contacts">
			<div class="info-block">
				<div>
					<b>Адрес:</b>
                    <p>
						Москва, Красная Пресня 29
                    </p>
    			</div>
				<div class="contacts-item">
					<b>График работы:</b>
                    <p>
						Пн-пт: 9:00-18:00 (московское время)
                    </p>
    			</div>
				<div class="contacts-item">
					<b>Рабочий телефон:</b>
                    <p>
						8 800 600-50-09
                    </p>
    			</div>
				<div class="contacts-item">
					<b>Электронная почта:</b>
                    <p>
                        info@trest24.ru
                    </p>
    			</div>
			</div>
			<div class="contacts-map">
				<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A92c4bd3f606327452fd53acece97a0ba3fa250e8834e535886f75b0b9fc205dd&amp;source=constructor" frameborder="0"></iframe>
   			</div>
			<div class="info-block">
       				<form data-type="dynamic-form" end_point="https://trest24.ru/turbo_add_task.php" class="form">
                        <div type="input-block">
                            <span type="input" name="name" label="Имя" input-type="text" placeholder="Иван Иванов" required="true"></span>
                            <span type="input" name="phone" label="Телефон" input-type="text" placeholder="+7(XXX)XXX-XX-XX" required="true"></span>
                            <button type="submit" text="Оставить заявку"></button>
                        </div>
                        <div type="result-block">
                            <span type="text" field="description"></span>
                            <span type="link" field="link"></span>
                        </div>
                     </form>
         </div>
  		</div>';

        $item .= self::getPageFooter() . ']]></turbo:content></item>';

        return $item;
    }
}