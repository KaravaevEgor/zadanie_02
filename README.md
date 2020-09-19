### Git
```bash
git add .
git commit -m "Save"
git push
```

### Регистрация
URL:  {service}/signup
Method: POST
Data params:
●	first_name - обязательное
●	surname - обязательное
●	phone - обязательное, уникальное, ровно 11 цифр, может быть с ведущими нулями
●	password - обязательное
Success response:
●	Code: 201 Created
●	Content:
○	id - идентификатор созданного пользователя
Error Response: 
●	Code: 422 Unprocessable entity
●	Content - объект, где ключи - это поля, которые не прошли валидацию, а их значения - текст ошибки валидации
