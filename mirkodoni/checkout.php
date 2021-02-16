<!-- <html>
<head>
	<script type="text/javascript">
		function onVisaCheckoutReady(){
			V.init( {
				apikey: "J1YZU6CFCNDQNS57AM1721hNsLQ9BCwqjVjfysC4Voyz4c400",
				encryptionKey: "b9I0uEoVOtSPnC58W33GlChj1I9Suaqf@InGuw8J",
				paymentRequest:{
					currencyCode: "PEN",
					subtotal: "11.00"
				}
			});
			V.on("payment.success", function(payment)
				{alert(JSON.stringify(payment)); });
			V.on("payment.cancel", function(payment)
				{alert(JSON.stringify(payment)); });
			V.on("payment.error", function(payment, error)
				{alert(JSON.stringify(error)); });
		}
	</script>
</head>

<body>
	<img alt="Visa Checkout" onClick="onVisaCheckoutReady()" class="v-button" role="button"
	src="https://sandbox.secure.checkout.visa.com/wallet-services-web/xo/button.png"/>
	<script type="text/javascript"
	src="https://sandbox-assets.secure.checkout.visa.com/
	checkout-widget/resources/js/integration/v1/sdk.js">
</script>
</body>
</html>
 
-->


<html>

<head>
    <script type="text/javascript">

        function createCookie(name,value,days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days*24*60*60*1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + value + expires + "; path=/";
        }

        function readCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for(var i=0;i < ca.length;i++) {
                var c = ca[i];
                while (c.charAt(0)==' ') c = c.substring(1,c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
            }
            return null;
        }

        function onVisaCheckoutReady() {

            if (readCookie('caller')) {
                console.log('reused');
                var ops = {
                    // referenceCallID: readCookie('caller'),
                    apikey: "J1YZU6CFCNDQNS57AM1721hNsLQ9BCwqjVjfysC4Voyz4c400",
                    sourceId: "b9I0uEoVOtSPnC58W33GlChj1I9Suaqf@InGuw8J",
                    settings: {
                        locale: "en_PE",
                        countryCode: "PE",
                        displayName: "...Corp",
                        websiteUrl: "www....Corp.com",
                        customerSupportUrl: "www....Corp.support.com",
                        shipping: {
                            acceptedRegions: ["US", "CA", "AU","PE"],
                            collectShipping: "true"
                        },
                        payment: {
                            cardBrands: [
                                "VISA",
                                "MASTERCARD"],
                            acceptCanadianVisaDebit: "true",
                            billingCountries: ["US", "CA", "AU","PE"]
                        }, review: {
                            message: "Merchant defined message",
                            buttonAction: "Continue"
                        },
                        dataLevel: "SUMMARY"
                    },
                    paymentRequest: {
                        merchantRequestId: "Merchant defined request ID",
                        currencyCode: "USD",
                        subtotal: "10.00",
                        shippingHandling: "2.00",
                        tax: "2.00",
                        discount: "1.00",
                        giftWrap: "2.00",
                        misc: "1.00",
                        total: "16.00",
                        description: "...corp Product",
                        orderId: 1001,
                    }
                };
            } else {
                var ops = {
                    apikey: "J1YZU6CFCNDQNS57AM1721hNsLQ9BCwqjVjfysC4Voyz4c400",
                    sourceId: "b9I0uEoVOtSPnC58W33GlChj1I9Suaqf@InGuw8J",
                    settings: {
                        locale: "en_PE",
                        countryCode: "PE",
                        displayName: "...Corp",
                        websiteUrl: "www....Corp.com",
                        customerSupportUrl: "www....Corp.support.com",
                        shipping: {
                            acceptedRegions: ["US", "CA", "AU","PE"],
                            collectShipping: "true"
                        },
                        payment: {
                            cardBrands: [
                                "VISA",
                                "MASTERCARD"],
                            acceptCanadianVisaDebit: "true",
                            billingCountries: ["US", "CA", "AU","PE"]
                        }, review: {
                            message: "Merchant defined message",
                            buttonAction: "Continue"
                        },
                        dataLevel: "SUMMARY"
                    },
                    paymentRequest: {
                        merchantRequestId: "Merchant defined request ID",
                        currencyCode: "PEN",
                        subtotal: "10.00",
                        shippingHandling: "0.00",
                        tax: "0.00",
                        discount: "0.00",
                        giftWrap: "0.00",
                        misc: "0.00",
                        total: "10.00",
                        description: "...corp Product",
                        orderId: 1001,
                    }
                };
            }
            console.log(ops);
            V.init(ops);

            V.on("payment.success", function (payment) {
                createCookie('caller', payment.callid);
                console.log(payment);

            });

        }
    </script>
</head>

<body>
    <img alt="Visa Checkout" onClick="onVisaCheckoutReady()" class="v-button" role="button"
	src="https://sandbox.secure.checkout.visa.com/wallet-services-web/xo/button.png"/>
 
    <script type="text/javascript" 	src="https://sandbox-assets.secure.checkout.visa.com/checkout-widget/resources/js/integration/v1/sdk.js">

    </script>
</body>

</html>
 