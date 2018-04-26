from polls.models import Question, Choice
from django.utils import timezone

q = Question(question_text="What's new?", pub_date=timezone.now())
q.save()
q.question_text = "What's up?"
q.save()
current_year = timezone.now().year
Question.objects.get(pub_date__year=current_year)
q = Question.objects.get(pk=1)
q.choice_set.create(choice_text='Not much', votes=0)
q.choice_set.create(choice_text='The sky', votes=0)