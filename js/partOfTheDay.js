const element = document.getElementById("part-of-the-day");

const getTimePeriod = () => {
  const currentTime = new Date();
  const currentHour = currentTime.getHours();

  if (currentHour >= 5 && currentHour < 12) {
    return 'Доброе утро';
  } else if (currentHour >= 12 && currentHour < 18) {
    return 'Добрый день';
  } else if (currentHour >= 18 && currentHour < 21) {
    return 'Добрый вечер';
  } else {
    return 'Доброй ночи';
  }
}

element.textContent = getTimePeriod();