# Email Service Api

## Send Email:

| Variable        | Type    | Required                    |
|-----------------|---------|-----------------------------|
| ``` Emails ```  | array   | Required                    |
| ``` Subject ``` | string  | Required                    |
| ``` Message ``` | string  | Required                    |

```bash
POST domain.com/api/email/send
```

## Show Log:

```bash
GET domain.com/api/email/logs
```
