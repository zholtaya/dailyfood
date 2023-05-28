<section class="cart">
    <div class="container">
        <h2 class="headtitle_style">
            Оформление заказа
        </h2>
        <div class="content_cart">
            <div class="payment_address_content">
                <div class="order_payment_content">
                    <form method="POST" class="form_style_order">
                        <p class="title_order_payment">
                            Способ оплаты
                        </p>
                        <select name="payment" id="payment" class="select_style_order">
                            <option value="0">Картой</option>
                            <option value="1">Наличными при получении</option>
                        </select>
                        <p class="title_order_payment">
                            Адрес доставки
                        </p>
                        <input type="text" class="input_style_order" placeholder="Улица, номер дома">

                        <div class="address_inputs_order">
                            <input type="text" class="input_style_order_address" placeholder="Кв/офис">
                            <input type="text" class="input_style_order_address" placeholder="Подъезд">
                            <input type="text" class="input_style_order_address" placeholder="Этаж">
                            <input type="text" class="input_style_order_address" placeholder="Домофон">
                        </div>
                        <input type="text" class="input_style_order" placeholder="Комментарий курьеру">
                    </form>
                </div>
            </div>
            <div class="content_cart_final_price">
                <p class="final_price_title">
                    Итого
                </p>
                <div class="cart_final_price_product_delivery">
                    <div class="cart_final_price_product">
                        <p>Товары</p>
                        <p>680 ₽</p>
                    </div>
                    <div class="cart_final_price_delivery">
                        <p>Доставка</p>
                        <p>Бесплатно</p>
                    </div>
                    <!-- <div class="delivery_price_counter">
                        <p>Еще 320 ₽ до бесплатной доставки</p>
                    </div> -->
                </div>
                <div class="total_price_cart">
                    <p>К оплате</p>
                    <p>1020 ₽</p>
                </div>
                <a href="#" class="button_cart">Перейти к оплате</a>
            </div>
        </div>
    </div>
</section>