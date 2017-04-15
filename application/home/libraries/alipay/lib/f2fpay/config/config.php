<?php
$config = array (
		//签名方式,默认为RSA2(RSA2048)
		'sign_type' => "RSA",

		//支付宝公钥
		'alipay_public_key' => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCk0/W91euTEehXEIadm2+ZJbsh
TVEuBL+6DDMqrEH0hSRe3JJ6nYm201Ajm4lSotG3p268G42a/omirG9QdZxPj9F1
sPu9ambGqh04f5062ktCsOZTK8khP9tEaE15nq7oGFuzDufAMCZx6PZhwO/cz+jL
xcf9FGoR9Y3c1oLvIQIDAQAB
",

		//商户私钥
		'merchant_private_key' => "-----BEGIN RSA PRIVATE KEY-----
MIICXQIBAAKBgQCk0/W91euTEehXEIadm2+ZJbshTVEuBL+6DDMqrEH0hSRe3JJ6
nYm201Ajm4lSotG3p268G42a/omirG9QdZxPj9F1sPu9ambGqh04f5062ktCsOZT
K8khP9tEaE15nq7oGFuzDufAMCZx6PZhwO/cz+jLxcf9FGoR9Y3c1oLvIQIDAQAB
AoGAKZqOppH+Wirk+ETllZaMPp21dBxt5y2vrygxKg48v5lzqrYGCwkEn68KxVIX
AVKzmKWcX8KcpYil+PeJSUfGYi7fBJ2JTuwlgrop5mPbByOe1dA3tx8ekLcFlTt5
74Uw6c4giTvDnSIbHn1zTN19PV5EqHUSZmY9kcJRhhjD4lkCQQDW5puzqDbskGJp
3VN9grLPSWNaDfh/JqgHds1ulyVk6k4Mc84stVuKEnqSgOowQl3lOZJb5sbqfB9u
jtNNjNajAkEAxFnSFp1mR4qznZ7gTq/LkbVuUacPBBPZ+yptPYJIuacmxFc0pBhR
bqPR0NA+MyP+8JiGjIg78Rpc4OP6rH5zawJAZ98NMThEW/Gp79uPqGHNBc5GHFgW
XXcUzo7I2wRpia6KzRAIfqmmNkWaQ0fWaj8Z3VsHeC5CxUH7e1fDoH9LmwJBALMJ
a8VvNEnbsTfyHHnjVe3Az5zohYqkR0j8QKurVoDiZzj0g211Nxt5iOGsYGrlUZs0
mMsflficnz/44SPUEY0CQQDRMiF67fffWuBCAsd2Og53jqt65GOPdUTpeyACGKKF
nYMx7GzC6ouvwVjlb7s/ADBw84LKSAgvqSND2YZmyhUz
-----END RSA PRIVATE KEY-----",

		//编码格式
		'charset' => "UTF-8",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

		//应用ID
		'app_id' => "2015122301031062",

		//异步通知地址,只有扫码支付预下单可用
		'notify_url' => "http://www.baidu.com",

		//最大查询重试次数
		'MaxQueryRetry' => "10",

		//查询间隔
		'QueryDuration' => "3"
);